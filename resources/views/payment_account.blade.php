
<h4 class="mt-3 mb-3">Select Account:</h4>
@foreach($accounts as $account)
    <div class="form-check p-2 pl-5">
        <input class="form-check-input" style="height: 25px; width: 25px;" type="radio" name="account" id="account{{ $account->id }}" value="{{ $account->account_no }}" required>
        <label class="form-check-label col-md-6" for="account{{ $account->id }}">
        <div class="ml-4 px-5 py-3 payment-account">

            <span style="font-weight: bold; font-size: 25px;">A/C : </span><span style="color: red;font-size: 25px;"> {{ $account->account_no }}</span>
            @isset($account->is_agent)
                <span class="font-italic">({{ $account->is_agent==0?'Personal':'Agent' }})</span>
            @endisset
            <br>
            @isset($account->name)
            <span class="font-weight-bold" style="font-size: 20px;">Name : </span>
            <span style="font-size: 20px;"> Jalal Uddin</span>
            <br>
            @endisset

            @isset($account->branch)
            <span class="font-weight-bold" style="font-size: 20px;">Branch : </span>
            <span style="font-size: 20px;">Lohagara Branch, Chattogram</span>
            <br>
            @endisset
            @isset($account->routing_no)
            <span class="font-weight-bold" style="font-size: 20px;">Routing No : </span>
            <span style="font-size: 20px;">060154675</span>
            <br>
            @endisset
            @isset($account->mobile_no)
            <span class="font-weight-bold" style="font-size: 20px;">Mobile No : </span>
            <span style="font-size: 20px;">01859367602</span>
            @endisset

        </div>
        </label>
    </div>
@endforeach
<div class="p-1 text-black mb-3 mt-3 text-center payment-notice">After sending donation to your selected account fillup below form</div>

@guest
<div class="col-md-4 d-inline-block ml-2">
    <label>Name:</label>
    <input type="text" name="name" class="form-control p-1" placeholder="Enter Your Name">
</div>
@endguest
@auth
    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
@endauth

<div class="col-md-4 d-inline-block ml-2">
    <label>Amount:<span style="font-size: 20px;color: red;">*</span></label>
    <input type="number" min="0" name="amount" class="form-control p-1" placeholder="Enter amount in tk" required>
</div>

<div class="col-md-4 d-block ml-2">
    <label>Mobile No:</label>
    <input type="text" name="mobile" class="form-control p-1" placeholder="Enter your mobile no">
</div>

@auth
    <input type="hidden" name="user" value="{{ Auth::user()->id }}">
@elseauth
    <input type="hidden" name="user" value="">
@endauth

<input type="submit" name="submit" value="SUBMIT" class="btn btn-dark mt-2 ml-2">
