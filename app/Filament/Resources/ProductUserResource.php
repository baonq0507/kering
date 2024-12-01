<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductUserResource\Pages;
use App\Filament\Resources\ProductUserResource\RelationManagers;
use App\Models\ProductUser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Notifications\Notification;
use Filament\Tables\Enums\FiltersLayout;



class ProductUserResource extends Resource
{
    protected static ?string $model = ProductUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quản lý';

    protected static ?string $navigationLabel = 'Quản lý đơn hàng';

    public static ?string $label = 'Quản lý đơn hàng';

    public static function getNavigationBadge(): ?string
    {
        return ProductUser::where('status', 'pending')->count();
    }

    public static function getEloquentQuery(): Builder
    {
        return ProductUser::query()->orderBy('created_at', 'desc');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông tin đơn hàng')
                    ->schema([
                        TextInput::make('order_code')
                            ->label('Mã đơn hàng')
                            ->suffixAction(function () {
                                return Forms\Components\Actions\Action::make('random')
                                    ->icon('heroicon-m-arrow-path')
                                    ->label('Random')
                                    ->action(function ($state, $set) {
                                        $set('order_code', 'AE' . Str::random(6));
                                    });
                            }),
                        Select::make('user_id')
                            ->label('Người thực hiện')
                            ->relationship('user', 'full_name')
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->full_name} - {$record->phone_number}"),
                        Select::make('product_id')
                            ->label('Sản phẩm')
                            ->relationship('product', 'name')
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->name} - {$record->price}$"),
                        Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'pending' => 'Chờ thực hiện',
                                'completed' => 'Đã thực hiện',
                                'failed' => 'Thất bại',
                            ]),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_code')
                    ->label('Mã đơn hàng')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                TextColumn::make('user.full_name')
                    ->searchable()
                    ->sortable()
                    ->label('Người thực hiện')
                    ->formatStateUsing(fn ($record) => "{$record->user->id} - {$record->user->full_name} - {$record->user->phone_number}"),
                TextColumn::make('product.name')
                    ->searchable()
                    ->sortable()
                    ->label('Sản phẩm')
                    ->formatStateUsing(fn ($record) => "{$record->product->id} - " . Str::limit($record->product->name, 20) . " - {$record->product->price}$"),
                TextColumn::make('before_balance')
                    ->label('Số dư trước')
                    ->formatStateUsing(fn ($record) => number_format($record->before_balance, 2, ',', '.') . '$'),
                TextColumn::make('after_balance')
                    ->label('Số dư sau')
                    ->formatStateUsing(fn ($record) => number_format($record->after_balance, 2, ',', '.') . '$'),
                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->formatStateUsing(fn ($state) => $state === 'pending' ? 'Chờ thực hiện' : ($state === 'completed' ? 'Đã thực hiện' : 'Thất bại'))
                    ->badge(),
            ])
            ->filters([
                //filter by user
                SelectFilter::make('user_id')
                    ->label('Người thực hiện')
                    ->relationship('user', 'full_name')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->id} - {$record->full_name} - {$record->phone_number}"),
                SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'pending' => 'Chờ thực hiện',
                        'completed' => 'Đã thực hiện',
                        'failed' => 'Thất bại',
                    ])
                ], layout: FiltersLayout::AboveContent)->filtersFormColumns(3)
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('completed')
                        ->label('Đã thực hiện')
                        ->color('success')
                        ->icon('heroicon-o-check')
                        ->action(function (ProductUser $record) {
                            $record->status = 'completed';
                            $profit = $record->product->price * $record->product->level->commission / 100;
                            $record->user->balance = $record->user->balance_lock;
                            $record->user->balance_lock = 0;
                            $record->user->total_order += 1;
                            $record->user->balance += $record->product->price + $profit;
                            $record->user->save();
                            $record->save();
                            Notification::make()
                                ->title('Đã thực hiện nhiệm vụ')
                                ->body('Nhiệm vụ ' . $record->order_code . ' đã được thực hiện thành công')
                                ->send();
                        })->visible(fn (ProductUser $record) => $record->status === 'pending'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductUsers::route('/'),
            'create' => Pages\CreateProductUser::route('/create'),
            'edit' => Pages\EditProductUser::route('/{record}/edit'),
        ];
    }
}
