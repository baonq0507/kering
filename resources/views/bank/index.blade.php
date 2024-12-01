@extends('layouts.app')
@section('title', __('mess.bank_info'))
@push('css')
<style>
    body {
        background-color: rgb(248 249 250 / 1);
    }

    .cardBox {
        width: 100%;
    }
</style>
@endpush
@section('content')
<!-- @include('includes.header') -->
<div id="app" class="container">
    <div class="row align-items-center">
        <div class="col-3">
            <div class="left_btn mt-3" onclick="window.history.back(-1)">
                <img src="/staticindex/arrow.png" alt="" class="return">
            </div>
        </div>
        <div class="col-7 col-md-6">
            <h4 class="text-center">{{ __('mess.link_bank_account') }}</h4>
        </div>
    </div>

    <form action="{{ route('bank.store') }}" id="login-form" method="post">
        @csrf
        <div class="bink_card">
            <ul class="bink_card_ul" style="text-align: center;">
                <li>
                    <h4 class="cardTit">{{ __('mess.cellphone_number') }}</h4>
                    <input type="text" name="tel" maxlength="16" class="cardBox"
                        placeholder="{{ __('mess.please_enter_phone_number') }}" value="{{ auth()->user()->phone_number }}" readonly>
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.bank') }}</h4>
                    <select name="bank_name" class="cardBox">
                        <option value="Academy Bank" {{ auth()->user()->bank_name == 'Academy Bank' ? 'selected' : '' }}>Academy Bank</option>
                        <option value="ACB Bank" {{ auth()->user()->bank_name == 'ACB Bank' ? 'selected' : '' }}>ACB Bank</option>
                        <option value="Abu Dhabi bank" {{ auth()->user()->bank_name == 'Abu Dhabi bank' ? 'selected' : '' }}>Abu Dhabi bank</option>
                        <option value="AgFirst Farm Credit Bank" {{ auth()->user()->bank_name == 'AgFirst Farm Credit Bank' ? 'selected' : '' }}>AgFirst Farm Credit Bank</option>
                        <option value="Agribank" {{ auth()->user()->bank_name == 'Agribank' ? 'selected' : '' }}>Agribank</option>
                        <option value="Alberta Treasury Bank ( ATB)" {{ auth()->user()->bank_name == 'Alberta Treasury Bank ( ATB)' ? 'selected' : '' }}>Alberta Treasury Bank ( ATB)</option>
                        <option value="American Express Bank" {{ auth()->user()->bank_name == 'American Express Bank' ? 'selected' : '' }}>American Express Bank</option>
                        <option value="American Savings Bank" {{ auth()->user()->bank_name == 'American Savings Bank' ? 'selected' : '' }}>American Savings Bank</option>
                        <option value="Arizona Financial Credit Union" {{ auth()->user()->bank_name == 'Arizona Financial Credit Union' ? 'selected' : '' }}>Arizona Financial Credit Union</option>
                        <option value="ANZ Bank" {{ auth()->user()->bank_name == 'ANZ Bank' ? 'selected' : '' }}>ANZ Bank</option>
                        <option value="Armed Forces Bank" {{ auth()->user()->bank_name == 'Armed Forces Bank' ? 'selected' : '' }}>Armed Forces Bank</option>
                        <option value="Austin Telco Federal Credit Union" {{ auth()->user()->bank_name == 'Austin Telco Federal Credit Union' ? 'selected' : '' }}>Austin Telco Federal Credit Union</option>
                        <option value="Bac A Bank" {{ auth()->user()->bank_name == 'Bac A Bank' ? 'selected' : '' }}>Bac A Bank</option>
                        <option value="Ban Viet Bank" {{ auth()->user()->bank_name == 'Ban Viet Bank' ? 'selected' : '' }}>Ban Viet Bank</option>
                        <option value="Bank of America (BOA)" {{ auth()->user()->bank_name == 'Bank of America (BOA)' ? 'selected' : '' }}>Bank of America (BOA)</option>
                        <option value="Bank of Botetourt" {{ auth()->user()->bank_name == 'Bank of Botetourt' ? 'selected' : '' }}>Bank of Botetourt</option>
                        <option value="Bank of Hawaii" {{ auth()->user()->bank_name == 'Bank of Hawaii' ? 'selected' : '' }}>Bank of Hawaii</option>
                        <option value="Bank of Montreal" {{ auth()->user()->bank_name == 'Bank of Montreal' ? 'selected' : '' }}>Bank of Montreal</option>
                        <option value="Bank of Nevada" {{ auth()->user()->bank_name == 'Bank of Nevada' ? 'selected' : '' }}>Bank of Nevada</option>
                        <option value="Bank of New Hampshire" {{ auth()->user()->bank_name == 'Bank of New Hampshire' ? 'selected' : '' }}>Bank of New Hampshire</option>
                        <option value="Bank of New York Mellon" {{ auth()->user()->bank_name == 'Bank of New York Mellon' ? 'selected' : '' }}>Bank of New York Mellon</option>
                        <option value="Bank of North Carolina" {{ auth()->user()->bank_name == 'Bank of North Carolina' ? 'selected' : '' }}>Bank of North Carolina</option>
                        <option value="Bank of the West" {{ auth()->user()->bank_name == 'Bank of the West' ? 'selected' : '' }}>Bank of the West</option>
                        <option value="Bank of Queensland" {{ auth()->user()->bank_name == 'Bank of Queensland' ? 'selected' : '' }}>Bank of Queensland</option>
                        <option value="Bank OZK" {{ auth()->user()->bank_name == 'Bank OZK' ? 'selected' : '' }}>Bank OZK</option>
                        <option value="BNP Paribas" {{ auth()->user()->bank_name == 'BNP Paribas' ? 'selected' : '' }}>BNP Paribas</option>
                        <option value="Bankwest" {{ auth()->user()->bank_name == 'Bankwest' ? 'selected' : '' }}>Bankwest</option>
                        <option value="BaoViet Bank" {{ auth()->user()->bank_name == 'BaoViet Bank' ? 'selected' : '' }}>BaoViet Bank</option>
                        <option value="Barclays Bank" {{ auth()->user()->bank_name == 'Barclays Bank' ? 'selected' : '' }}>Barclays Bank</option>
                        <option value="BECU" {{ auth()->user()->bank_name == 'BECU' ? 'selected' : '' }}>BECU</option>
                        <option value="BMO Bank North America" {{ auth()->user()->bank_name == 'BMO Bank North America' ? 'selected' : '' }}>BMO Bank North America</option>
                        <option value="BIDV" {{ auth()->user()->bank_name == 'BIDV' ? 'selected' : '' }}>BIDV</option>
                        <option value="Canadian Western Bank" {{ auth()->user()->bank_name == 'Canadian Western Bank' ? 'selected' : '' }}>Canadian Western Bank</option>
                        <option value="Chase Bank" {{ auth()->user()->bank_name == 'Chase Bank' ? 'selected' : '' }}>Chase Bank</option>
                        <option value="Capital One Bank" {{ auth()->user()->bank_name == 'Capital One Bank' ? 'selected' : '' }}>Capital One Bank</option>
                        <option value="Capitol Federal Savings Bank" {{ auth()->user()->bank_name == 'Capitol Federal Savings Bank' ? 'selected' : '' }}>Capitol Federal Savings Bank</option>
                        <option value="Central Bank" {{ auth()->user()->bank_name == 'Central Bank' ? 'selected' : '' }}>Central Bank</option>
                        <option value="Central Bank of Uruguay" {{ auth()->user()->bank_name == 'Central Bank of Uruguay' ? 'selected' : '' }}>Central Bank of Uruguay</option>
                        <option value="Comerica Bank" {{ auth()->user()->bank_name == 'Comerica Bank' ? 'selected' : '' }}>Comerica Bank</option>
                        <option value="Commonwealth Bank" {{ auth()->user()->bank_name == 'Commonwealth Bank' ? 'selected' : '' }}>Commonwealth Bank</option>
                        <option value="CIBC Bank" {{ auth()->user()->bank_name == 'CIBC Bank' ? 'selected' : '' }}>CIBC Bank</option>
                        <option value="Caisse d'Epargne" {{ auth()->user()->bank_name == 'Caisse d\'Epargne' ? 'selected' : '' }}>Caisse d'Epargne</option>
                        <option value="CIMB Bank" {{ auth()->user()->bank_name == 'CIMB Bank' ? 'selected' : '' }}>CIMB Bank</option>
                        <option value="CIT Bank" {{ auth()->user()->bank_name == 'CIT Bank' ? 'selected' : '' }}>CIT Bank</option>
                        <option value="Citibank USA" {{ auth()->user()->bank_name == 'Citibank USA' ? 'selected' : '' }}>Citibank USA</option>
                        <option value="Citizens Bank USA" {{ auth()->user()->bank_name == 'Citizens Bank USA' ? 'selected' : '' }}>Citizens Bank USA</option>
                        <option value="Citizens Equity First Credit Union" {{ auth()->user()->bank_name == 'Citizens Equity First Credit Union' ? 'selected' : '' }}>Citizens Equity First Credit Union</option>
                        <option value="City National Bank California" {{ auth()->user()->bank_name == 'City National Bank California' ? 'selected' : '' }}>City National Bank California</option>
                        <option value="City National Bank of Florida" {{ auth()->user()->bank_name == 'City National Bank of Florida' ? 'selected' : '' }}>City National Bank of Florida</option>
                        <option value="Credit One Bank" {{ auth()->user()->bank_name == 'Credit One Bank' ? 'selected' : '' }}>Credit One Bank</option>
                        <option value="Credit Suisse" {{ auth()->user()->bank_name == 'Credit Suisse' ? 'selected' : '' }}>Credit Suisse</option>
                        <option value="Deutsche Bank" {{ auth()->user()->bank_name == 'Deutsche Bank' ? 'selected' : '' }}>Deutsche Bank</option>
                        <option value="Dacotah Bank" {{ auth()->user()->bank_name == 'Dacotah Bank' ? 'selected' : '' }}>Dacotah Bank</option>
                        <option value="Dong A Bank" {{ auth()->user()->bank_name == 'Dong A Bank' ? 'selected' : '' }}>Dong A Bank</option>
                        <option value="Excite Credit Union" {{ auth()->user()->bank_name == 'Excite Credit Union' ? 'selected' : '' }}>Excite Credit Union</option>
                        <option value="Eximbank" {{ auth()->user()->bank_name == 'Eximbank' ? 'selected' : '' }}>Eximbank</option>
                        <option value="EAST WEST BANK" {{ auth()->user()->bank_name == 'EAST WEST BANK' ? 'selected' : '' }}>EAST WEST BANK</option>
                        <option value="Falcon International Bank" {{ auth()->user()->bank_name == 'Falcon International Bank' ? 'selected' : '' }}>Falcon International Bank</option>
                        <option value="First National Bank of Fort Smith" {{ auth()->user()->bank_name == 'First National Bank of Fort Smith' ? 'selected' : '' }}>First National Bank of Fort Smith</option>
                        <option value="Frost Bank" {{ auth()->user()->bank_name == 'Frost Bank' ? 'selected' : '' }}>Frost Bank</option>
                        <option value="FirstBank" {{ auth()->user()->bank_name == 'FirstBank' ? 'selected' : '' }}>FirstBank</option>
                        <option value="Fifth Third Bank" {{ auth()->user()->bank_name == 'Fifth Third Bank' ? 'selected' : '' }}>Fifth Third Bank</option>
                        <option value="First Commercial Bank" {{ auth()->user()->bank_name == 'First Commercial Bank' ? 'selected' : '' }}>First Commercial Bank</option>
                        <option value="Grow Financial Bank" {{ auth()->user()->bank_name == 'Grow Financial Bank' ? 'selected' : '' }}>Grow Financial Bank</option>
                        <option value="Golden Bank" {{ auth()->user()->bank_name == 'Golden Bank' ? 'selected' : '' }}>Golden Bank</option>
                        <option value="Green Dot Bank" {{ auth()->user()->bank_name == 'Green Dot Bank' ? 'selected' : '' }}>Green Dot Bank</option>
                        <option value="Halifax Bank" {{ auth()->user()->bank_name == 'Halifax Bank' ? 'selected' : '' }}>Halifax Bank</option>
                        <option value="Huntington Bank" {{ auth()->user()->bank_name == 'Huntington Bank' ? 'selected' : '' }}>Huntington Bank</option>
                        <option value="HD Bank" {{ auth()->user()->bank_name == 'HD Bank' ? 'selected' : '' }}>HD Bank</option>
                        <option value="HSBC Bank Australia" {{ auth()->user()->bank_name == 'HSBC Bank Australia' ? 'selected' : '' }}>HSBC Bank Australia</option>
                        <option value="HSBC Bank Canada" {{ auth()->user()->bank_name == 'HSBC Bank Canada' ? 'selected' : '' }}>HSBC Bank Canada</option>
                        <option value="HSBC Bank England" {{ auth()->user()->bank_name == 'HSBC Bank England' ? 'selected' : '' }}>HSBC Bank England</option>
                        <option value="HSBC Bank USA" {{ auth()->user()->bank_name == 'HSBC Bank USA' ? 'selected' : '' }}>HSBC Bank USA</option>
                        <option value="INTRUST Bank" {{ auth()->user()->bank_name == 'INTRUST Bank' ? 'selected' : '' }}>INTRUST Bank</option>
                        <option value="JPMorgan Chase Bank" {{ auth()->user()->bank_name == 'JPMorgan Chase Bank' ? 'selected' : '' }}>JPMorgan Chase Bank</option>
                        <option value="JP Morgan Australia Bank" {{ auth()->user()->bank_name == 'JP Morgan Australia Bank' ? 'selected' : '' }}>JP Morgan Australia Bank</option>
                        <option value="KBC Bank" {{ auth()->user()->bank_name == 'KBC Bank' ? 'selected' : '' }}>KBC Bank</option>
                        <option value="KeyPoint Credit Union" {{ auth()->user()->bank_name == 'KeyPoint Credit Union' ? 'selected' : '' }}>KeyPoint Credit Union</option>
                        <option value="KeyBank" {{ auth()->user()->bank_name == 'KeyBank' ? 'selected' : '' }}>KeyBank</option>
                        <option value="KNOXVILLE TVA EMPLOYEES CREDIT UNION" {{ auth()->user()->bank_name == 'KNOXVILLE TVA EMPLOYEES CREDIT UNION' ? 'selected' : '' }}>KNOXVILLE TVA EMPLOYEES CREDIT UNION</option>
                        <option value="Lake Michigan Credit Union" {{ auth()->user()->bank_name == 'Lake Michigan Credit Union' ? 'selected' : '' }}>Lake Michigan Credit Union</option>
                        <option value="Laurentian Bank of Canada" {{ auth()->user()->bank_name == 'Laurentian Bank of Canada' ? 'selected' : '' }}>Laurentian Bank of Canada</option>
                        <option value="LCL Bank" {{ auth()->user()->bank_name == 'LCL Bank' ? 'selected' : '' }}>LCL Bank</option>
                        <option value="LienVietPostBank" {{ auth()->user()->bank_name == 'LienVietPostBank' ? 'selected' : '' }}>LienVietPostBank</option>
                        <option value="LifeStore Bank" {{ auth()->user()->bank_name == 'LifeStore Bank' ? 'selected' : '' }}>LifeStore Bank</option>
                        <option value="Lloyds Bank" {{ auth()->user()->bank_name == 'Lloyds Bank' ? 'selected' : '' }}>Lloyds Bank</option>
                        <option value="Luther Burbank Savings" {{ auth()->user()->bank_name == 'Luther Burbank Savings' ? 'selected' : '' }}>Luther Burbank Savings</option>
                        <option value="MB Bank" {{ auth()->user()->bank_name == 'MB Bank' ? 'selected' : '' }}>MB Bank</option>
                        <option value="M&T Bank" {{ auth()->user()->bank_name == 'M&T Bank' ? 'selected' : '' }}>M&T Bank</option>
                        <option value="MSB Bank" {{ auth()->user()->bank_name == 'MSB Bank' ? 'selected' : '' }}>MSB Bank</option>
                        <option value="Mission Federal Credit Union" {{ auth()->user()->bank_name == 'Mission Federal Credit Union' ? 'selected' : '' }}>Mission Federal Credit Union</option>
                        <option value="Nam A Bank" {{ auth()->user()->bank_name == 'Nam A Bank' ? 'selected' : '' }}>Nam A Bank</option>
                        <option value="National Australia Bank" {{ auth()->user()->bank_name == 'National Australia Bank' ? 'selected' : '' }}>National Australia Bank</option>
                        <option value="National Bank of Canada" {{ auth()->user()->bank_name == 'National Bank of Canada' ? 'selected' : '' }}>National Bank of Canada</option>
                        <option value="National Savings Bank" {{ auth()->user()->bank_name == 'National Savings Bank' ? 'selected' : '' }}>National Savings Bank</option>
                        <option value="Nationwide Bank" {{ auth()->user()->bank_name == 'Nationwide Bank' ? 'selected' : '' }}>Nationwide Bank</option>
                        <option value="NatWest  Bank" {{ auth()->user()->bank_name == 'NatWest  Bank' ? 'selected' : '' }}>NatWest Bank</option>
                        <option value="Navy Federal Credit Union" {{ auth()->user()->bank_name == 'Navy Federal Credit Union' ? 'selected' : '' }}>Navy Federal Credit Union</option>
                        <option value="New York Commercial Bank" {{ auth()->user()->bank_name == 'New York Commercial Bank' ? 'selected' : '' }}>New York Commercial Bank</option>
                        <option value="OCB" {{ auth()->user()->bank_name == 'OCB' ? 'selected' : '' }}>OCB</option>
                        <option value="Old National Bank" {{ auth()->user()->bank_name == 'Old National Bank' ? 'selected' : '' }}>Old National Bank</option>
                        <option value="POSTEITALIANE" {{ auth()->user()->bank_name == 'POSTEITALIANE' ? 'selected' : '' }}>POSTEITALIANE</option>
                        <option value="PNC Bank" {{ auth()->user()->bank_name == 'PNC Bank' ? 'selected' : '' }}>PNC Bank</option>
                        <option value="Public Bank" {{ auth()->user()->bank_name == 'Public Bank' ? 'selected' : '' }}>Public Bank</option>
                        <option value="PVcomBank" {{ auth()->user()->bank_name == 'PVcomBank' ? 'selected' : '' }}>PVcomBank</option>
                        <option value="Regions Bank" {{ auth()->user()->bank_name == 'Regions Bank' ? 'selected' : '' }}>Regions Bank</option>
                        <option value="Reserve Bank of Australia" {{ auth()->user()->bank_name == 'Reserve Bank of Australia' ? 'selected' : '' }}>Reserve Bank of Australia</option>
                        <option value="Royal Bank of Canada (RBC)" {{ auth()->user()->bank_name == 'Royal Bank of Canada (RBC)' ? 'selected' : '' }}>Royal Bank of Canada (RBC)</option>
                        <option value="Sacombank" {{ auth()->user()->bank_name == 'Sacombank' ? 'selected' : '' }}>Sacombank</option>
                        <option value="SaigonBank" {{ auth()->user()->bank_name == 'SaigonBank' ? 'selected' : '' }}>SaigonBank</option>
                        <option value="Santander Bank" {{ auth()->user()->bank_name == 'Santander Bank' ? 'selected' : '' }}>Santander Bank</option>
                        <option value="SCB Bank" {{ auth()->user()->bank_name == 'SCB Bank' ? 'selected' : '' }}>SCB Bank</option>
                        <option value="SCE Federal Credit Union" {{ auth()->user()->bank_name == 'SCE Federal Credit Union' ? 'selected' : '' }}>SCE Federal Credit Union</option>
                        <option value="SchoolsFirst Federal Credit Union" {{ auth()->user()->bank_name == 'SchoolsFirst Federal Credit Union' ? 'selected' : '' }}>SchoolsFirst Federal Credit Union</option>
                        <option value="Scotiabank" {{ auth()->user()->bank_name == 'Scotiabank' ? 'selected' : '' }}>Scotiabank</option>
                        <option value="SeABank" {{ auth()->user()->bank_name == 'SeABank' ? 'selected' : '' }}>SeABank</option>
                        <option value="SHB Bank" {{ auth()->user()->bank_name == 'SHB Bank' ? 'selected' : '' }}>SHB Bank</option>
                        <option value="Shinhan Bank" {{ auth()->user()->bank_name == 'Shinhan Bank' ? 'selected' : '' }}>Shinhan Bank</option>
                        <option value="Silicon Valley Bank" {{ auth()->user()->bank_name == 'Silicon Valley Bank' ? 'selected' : '' }}>Silicon Valley Bank</option>
                        <option value="Simplii Financial Online Banking" {{ auth()->user()->bank_name == 'Simplii Financial Online Banking' ? 'selected' : '' }}>Simplii Financial Online Banking</option>
                        <option value="Société Générale" {{ auth()->user()->bank_name == 'Société Générale' ? 'selected' : '' }}>Société Générale</option>
                        <option value="Sparekassen Vendsyssel" {{ auth()->user()->bank_name == 'Sparekassen Vendsyssel' ? 'selected' : '' }}>Sparekassen Vendsyssel</option>
                        <option value="Standard Chartered Bank" {{ auth()->user()->bank_name == 'Standard Chartered Bank' ? 'selected' : '' }}>Standard Chartered Bank</option>
                        <option value="Sberbank" {{ auth()->user()->bank_name == 'Sberbank' ? 'selected' : '' }}>Sberbank</option>
                        <option value="Sterling Savings Bank" {{ auth()->user()->bank_name == 'Sterling Savings Bank' ? 'selected' : '' }}>Sterling Savings Bank</option>
                        <option value="SunTrust Banks" {{ auth()->user()->bank_name == 'SunTrust Banks' ? 'selected' : '' }}>SunTrust Banks</option>
                        <option value="Truist Bank" {{ auth()->user()->bank_name == 'Truist Bank' ? 'selected' : '' }}>Truist Bank</option>
                        <option value="TB Bank" {{ auth()->user()->bank_name == 'TB Bank' ? 'selected' : '' }}>TB Bank</option>
                        <option value="Techcombank" {{ auth()->user()->bank_name == 'Techcombank' ? 'selected' : '' }}>Techcombank</option>
                        <option value="Texas Capital Bank" {{ auth()->user()->bank_name == 'Texas Capital Bank' ? 'selected' : '' }}>Texas Capital Bank</option>
                        <option value="The Royal Bank of Scotland" {{ auth()->user()->bank_name == 'The Royal Bank of Scotland' ? 'selected' : '' }}>The Royal Bank of Scotland</option>
                        <option value="TD Bank" {{ auth()->user()->bank_name == 'TD Bank' ? 'selected' : '' }}>TD Bank</option>
                        <option value="TD Canada Trust Bank" {{ auth()->user()->bank_name == 'TD Canada Trust Bank' ? 'selected' : '' }}>TD Canada Trust Bank</option>
                        <option value="TP Bank" {{ auth()->user()->bank_name == 'TP Bank' ? 'selected' : '' }}>TP Bank</option>
                        <option value="UBS Bank" {{ auth()->user()->bank_name == 'UBS Bank' ? 'selected' : '' }}>UBS Bank</option>
                        <option value="UOB" {{ auth()->user()->bank_name == 'UOB' ? 'selected' : '' }}>UOB</option>
                        <option value="USAA Bank" {{ auth()->user()->bank_name == 'USAA Bank' ? 'selected' : '' }}>USAA Bank</option>
                        <option value="U.S. Bank" {{ auth()->user()->bank_name == 'U.S. Bank' ? 'selected' : '' }}>U.S. Bank</option>
                        <option value="Yorkshire Bank" {{ auth()->user()->bank_name == 'Yorkshire Bank' ? 'selected' : '' }}>Yorkshire Bank</option>
                        <option value="VietABank" {{ auth()->user()->bank_name == 'VietABank' ? 'selected' : '' }}>VietABank</option>
                        <option value="VietBank" {{ auth()->user()->bank_name == 'VietBank' ? 'selected' : '' }}>VietBank</option>
                        <option value="Vietcombank" {{ auth()->user()->bank_name == 'Vietcombank' ? 'selected' : '' }}>Vietcombank</option>
                        <option value="VietinBank" {{ auth()->user()->bank_name == 'VietinBank' ? 'selected' : '' }}>VietinBank</option>
                        <option value="VIB Bank" {{ auth()->user()->bank_name == 'VIB Bank' ? 'selected' : '' }}>VIB Bank</option>
                        <option value="Virgin Money" {{ auth()->user()->bank_name == 'Virgin Money' ? 'selected' : '' }}>Virgin Money</option>
                        <option value="VP Bank" {{ auth()->user()->bank_name == 'VP Bank' ? 'selected' : '' }}>VP Bank</option>
                        <option value="Wells Fargo Bank" {{ auth()->user()->bank_name == 'Wells Fargo Bank' ? 'selected' : '' }}>Wells Fargo Bank</option>
                        <option value="Westpac Bank" {{ auth()->user()->bank_name == 'Westpac Bank' ? 'selected' : '' }}>Westpac Bank</option>
                        <option value="Wilshire Bank" {{ auth()->user()->bank_name == 'Wilshire Bank' ? 'selected' : '' }}>Wilshire Bank</option>
                        <option value="Woori Bank" {{ auth()->user()->bank_name == 'Woori Bank' ? 'selected' : '' }}>Woori Bank</option>
                        <option value="US Bank" {{ auth()->user()->bank_name == 'US Bank' ? 'selected' : '' }}>US Bank</option>
                        <option value="Suimitomo Mitsui" {{ auth()->user()->bank_name == 'Suimitomo Mitsui' ? 'selected' : '' }}>Suimitomo Mitsui</option>
                        <option value="三井住友銀行" {{ auth()->user()->bank_name == '三井住友銀行' ? 'selected' : '' }}>三井住友銀行</option>
                        <option value="ゆうちょ銀行" {{ auth()->user()->bank_name == 'ゆうちょ銀行' ? 'selected' : '' }}>ゆうちょ銀行</option>
                        <option value="BIDV" {{ auth()->user()->bank_name == 'BIDV' ? 'selected' : '' }}>BIDV</option>
                        <option value="vietinbank" {{ auth()->user()->bank_name == 'vietinbank' ? 'selected' : '' }}>vietinbank</option>
                        <option value="Vietcombank" {{ auth()->user()->bank_name == 'Vietcombank' ? 'selected' : '' }}>Vietcombank</option>
                        <option value="VPbank" {{ auth()->user()->bank_name == 'VPbank' ? 'selected' : '' }}>VPbank</option>
                        <option value="MBbank" {{ auth()->user()->bank_name == 'MBbank' ? 'selected' : '' }}>MBbank</option>
                        <option value="Techcombank" {{ auth()->user()->bank_name == 'Techcombank' ? 'selected' : '' }}>Techcombank</option>
                        <option value="ACB" {{ auth()->user()->bank_name == 'ACB' ? 'selected' : '' }}>ACB</option>
                        <option value="SHB" {{ auth()->user()->bank_name == 'SHB' ? 'selected' : '' }}>SHB</option>
                        <option value="STAR Financial Bank" {{ auth()->user()->bank_name == 'STAR Financial Bank' ? 'selected' : '' }}>STAR Financial Bank</option>
                        <option value="HDBank" {{ auth()->user()->bank_name == 'HDBank' ? 'selected' : '' }}>HDBank</option>
                        <option value="SCB" {{ auth()->user()->bank_name == 'SCB' ? 'selected' : '' }}>SCB</option>
                        <option value="Sacombank" {{ auth()->user()->bank_name == 'Sacombank' ? 'selected' : '' }}>Sacombank</option>
                        <option value="Star bank" {{ auth()->user()->bank_name == 'Star bank' ? 'selected' : '' }}>Star bank</option>
                        <option value="TPBank" {{ auth()->user()->bank_name == 'TPBank' ? 'selected' : '' }}>TPBank</option>
                        <option value="VIB" {{ auth()->user()->bank_name == 'VIB' ? 'selected' : '' }}>VIB</option>
                        <option value="MSB" {{ auth()->user()->bank_name == 'MSB' ? 'selected' : '' }}>MSB</option>
                        <option value="SeABank" {{ auth()->user()->bank_name == 'SeABank' ? 'selected' : '' }}>SeABank</option>
                        <option value="OCB" {{ auth()->user()->bank_name == 'OCB' ? 'selected' : '' }}>OCB</option>
                        <option value="Bac A Bank" {{ auth()->user()->bank_name == 'Bac A Bank' ? 'selected' : '' }}>Bac A Bank</option>
                        <option value="ABBANK" {{ auth()->user()->bank_name == 'ABBANK' ? 'selected' : '' }}>ABBANK</option>
                        <option value="Đông Á Bank" {{ auth()->user()->bank_name == 'Đông Á Bank' ? 'selected' : '' }}>Đông Á Bank</option>
                        <option value="vietbank" {{ auth()->user()->bank_name == 'vietbank' ? 'selected' : '' }}>vietbank</option>
                        <option value="Kienlongbank" {{ auth()->user()->bank_name == 'Kienlongbank' ? 'selected' : '' }}>Kienlongbank</option>
                        <option value="Shinhan Bank" {{ auth()->user()->bank_name == 'Shinhan Bank' ? 'selected' : '' }}>Shinhan Bank</option>
                        <option value="Woori Bank" {{ auth()->user()->bank_name == 'Woori Bank' ? 'selected' : '' }}>Woori Bank</option>
                        <option value="中國信託銀行（CTBC Bank )" {{ auth()->user()->bank_name == '中國信託銀行（CTBC Bank )' ? 'selected' : '' }}>中國信託銀行（CTBC Bank )</option>
                        <option value="Sparkasse Schwarzwald Baar" {{ auth()->user()->bank_name == 'Sparkasse Schwarzwald Baar' ? 'selected' : '' }}>Sparkasse Schwarzwald Baar</option>
                        <option value="crédit mutuel" {{ auth()->user()->bank_name == 'crédit mutuel' ? 'selected' : '' }}>crédit mutuel</option>
                        <option value="UFJ" {{ auth()->user()->bank_name == 'UFJ' ? 'selected' : '' }}>UFJ</option>
                        <option value="Mitsui Sumitomo" {{ auth()->user()->bank_name == 'Mitsui Sumitomo' ? 'selected' : '' }}>Mitsui Sumitomo</option>
                        <option value="Mizuho" {{ auth()->user()->bank_name == 'Mizuho' ? 'selected' : '' }}>Mizuho</option>
                        <option value="Risona" {{ auth()->user()->bank_name == 'Risona' ? 'selected' : '' }}>Risona</option>
                        <option value="Berliner Sparkassex " {{ auth()->user()->bank_name == 'Berliner Sparkassex ' ? 'selected' : '' }}>Berliner Sparkassex </option>
                        <option value="Česká spořitelna" {{ auth()->user()->bank_name == 'Česká spořitelna' ? 'selected' : '' }}>Česká spořitelna</option>
                        <option value="Sparkasse Wittgenstein" {{ auth()->user()->bank_name == 'Sparkasse Wittgenstein' ? 'selected' : '' }}>Sparkasse Wittgenstein</option>
                        <option value="ČSOB" {{ auth()->user()->bank_name == 'ČSOB' ? 'selected' : '' }}>ČSOB</option>
                        <option value="Ngân hàng Quốc Dân NCB" {{ auth()->user()->bank_name == 'Ngân hàng Quốc Dân NCB' ? 'selected' : '' }}>Ngân hàng Quốc Dân NCB</option>
                        <option value="yokoshin" {{ auth()->user()->bank_name == 'yokoshin' ? 'selected' : '' }}>yokoshin</option>
                        <option value="華南銀行" {{ auth()->user()->bank_name == '華南銀行' ? 'selected' : '' }}>華南銀行</option>
                        <option value="DongA Bank" {{ auth()->user()->bank_name == 'DongA Bank' ? 'selected' : '' }}>DongA Bank</option>
                        <option value="三菱　UFJ 銀行" {{ auth()->user()->bank_name == '三菱　UFJ 銀行' ? 'selected' : '' }}>三菱　UFJ 銀行</option>
                        <option value="하나은행" {{ auth()->user()->bank_name == '하나은행' ? 'selected' : '' }}>하나은행</option>
                        <option value="DAEGU BANK" {{ auth()->user()->bank_name == 'DAEGU BANK' ? 'selected' : '' }}>DAEGU BANK</option>
                        <option value="Daegu Bank" {{ auth()->user()->bank_name == 'Daegu Bank' ? 'selected' : '' }}>Daegu Bank</option>
                        <option value="Commerzbank" {{ auth()->user()->bank_name == 'Commerzbank' ? 'selected' : '' }}>Commerzbank</option>
                        <option value="LPbank" {{ auth()->user()->bank_name == 'LPbank' ? 'selected' : '' }}>LPbank</option>
                        <option value="LA BANQUE POSTALE " {{ auth()->user()->bank_name == 'LA BANQUE POSTALE ' ? 'selected' : '' }}>LA BANQUE POSTALE </option>
                        <option value="ACH" {{ auth()->user()->bank_name == 'ACH' ? 'selected' : '' }}>ACH</option>
                        <option value="sparkasse" {{ auth()->user()->bank_name == 'sparkasse' ? 'selected' : '' }}>sparkasse</option>
                        <option value="NOVAV KBM" {{ auth()->user()->bank_name == 'NOVAV KBM' ? 'selected' : '' }}>NOVAV KBM</option>
                        <option value="NovaKBM" {{ auth()->user()->bank_name == 'NovaKBM' ? 'selected' : '' }}>NovaKBM</option>
                        <option value="Woodforest National Bank" {{ auth()->user()->bank_name == 'Woodforest National Bank' ? 'selected' : '' }}>Woodforest National Bank</option>
                        <option value="THE NISHI-NIPPON CITY BANK" {{ auth()->user()->bank_name == 'THE NISHI-NIPPON CITY BANK' ? 'selected' : '' }}>THE NISHI-NIPPON CITY BANK</option>
                        <option value="KNOXVILLE TVA EMPLOYEES CREDIT UNION" {{ auth()->user()->bank_name == 'KNOXVILLE TVA EMPLOYEES CREDIT UNION' ? 'selected' : '' }}>KNOXVILLE TVA EMPLOYEES CREDIT UNION</option>
                    </select>
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.bank_account') }}</h4>
                    <input type="text" class="cardBox" name="bank_number" maxlength="50" placeholder="{{ __('mess.please_enter_the_bank_card_number') }}" value="{{ auth()->user()->bank_number ?? old('bank_number') }}">
                    @error('bank_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.actual_name') }}</h4>
                    <input type="text" name="bank_owner" maxlength="30" value="{{ auth()->user()->bank_owner ?? old('bank_owner') }}"
                        placeholder="{{ __('mess.please_enter_your_real_name') }}" class="cardBox">
                    @error('bank_owner')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                @if (auth()->user()->bank_number == null || auth()->user()->bank_owner == null || auth()->user()->bank_name == null)
                <li>
                    <button class="btn-secondary btn w-100">{{ __('mess.save') }}</button>
                </li>
                @endif
            </ul>
        </div>
    </form>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
</div>
</div>
@include('includes.footer')
@endsection
