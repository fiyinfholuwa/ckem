@extends('frontend.app')



@section('content')

    <section
        style="background-image: url({{asset('frontend/assets/img/blog.avif')}})"
        class="banner relative"
    >
        <div class="overlay2"></div>
        <h1>DONATIONS</h1>
        <p class="text-white">
            <span class="text-graz font-bold">Home</span> / Donations
        </p>
    </section>

    <section class="content">
        <div class="px-[4rem]">
            <div>
                <h3 class="header-title">Giving towards an honourable cause</h3>
                <div class="marker">
                    <div class="line"></div>
                    <div class="circle"></div>
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <h6 style="color:#bd302d; font-weight:600; font-size:25px;">Give to God's Work</h6>
                    <p>
                        Your donation is a gift to God. With your support, we can continue to serve our community,
                        spread the message of love, and uphold our mission to glorify God in all we do. Whether you give
                        online or in person, your generosity helps us fulfill our calling to make a difference in the
                        world. Thank you for partnering with us in this important work of faith.
                    </p>
                    <p>
                        "Honor the LORD with your wealth and with the firstfruits of all your produce; then your barns
                        will be filled with plenty, and your vats will be bursting with wine."
                        Proverbs 3: 9-10
                    </p>
                </div>

                <div class="col-lg-6 mt-5">
                    <div class="payment-tabs">
                        <button class="tablinks active" onclick="openTab(event, 'bank-transfer')">Bank Transfer</button>
                        <button class="tablinks" onclick="openTab(event, 'online-payment')">Online Payment</button>
                    </div>
                    <div id="bank-transfer" class="tabcontent" style="display: block;">
                        <h3>Bank Transfer Details</h3>
                        <div class="account-details">
                            <button id="bt1" class="copy-btn" onclick="copyAccountNumber('local')"><i class="fa fa-copy"></i></button>
                            <h4>Naira Account</h4>
                            <h5>2022481337
                            </h5>
                            <h6>First Bank
                            </h6>
                            <h5>CHRIST KINGDOM EXPANSION INTERNATIONAL
                            </h5>

                            <h4>Dollar Account</h4>
                            <h5>2024481984 </h5>
                            <h6>First Bank
                            </h6>
                            <h5>CHRIST KINGDOM EXPANSION INTERNATIONAL
                            </h5>
                            <button id="bt2" class="copy-btn" onclick="copyAccountNumber('dollar')"><i class="fa fa-copy"></i></button>
                        </div>
                    </div>
                    <div id="online-payment" class="tabcontent" style="display:none;">
                        <h3>Pay Online</h3>
                        <form  action="{{route('pay')}}"  method="post" id="online-payment-form">
                            @csrf
                            <label for="fullname">Full Name:</label>
                            <input class="form-control" type="text" id="fullname" name="full_name" required><br><br>
                            <label for="donation-type">Payment Type:</label>
                            <select id="donation-type" name="payment_type">
                                <option value="">Select Option</option>
                                <option value="tithe">Tithe</option>
                                <option value="offering">Offering</option>
                                <option value="first fruit">First Fruit</option>
                            </select><br><br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required><br><br>
                            <label for="amount">Amount:</label>
                            <input type="number" id="amount" name="amount" required><br><br>
                            <input style="background-color: #0d1213; padding: 10px 20px; color: #fff;" class="btn btn-success" type="submit" value="Proceed">
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .account-details{
            position: relative;
        }
        .account-details h5{
            font-size: 18px;
            color: #bd302d;
            font-weight: bolder;
        }
        .account-details h6{
            font-weight: bolder;
        }
        .account-details #bt1{
            position: absolute;
            top: 20px;
            right: 100px;
        }
        .account-details #bt2{
            position: absolute;
            top: 150px;
            right: 100px;
        }
        .account-details h4{
            font-weight: bolder;
            font-size: 25px;
        }
        .account-details p{
            font-weight: bolder;
            font-size: 15px;
        }
        #bank-transfer h3, #online-payment h3{
            font-size: 20px;
            margin-top: 30px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .col-lg-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 15px;
        }

        .payment-tabs {
            text-align: right;
        }

        .tabcontent {
            display: none;
        }

        .tabcontent.active {
            display: block;
        }

        .tablinks {
            background-color: #f2f2f2;
            padding: 10px 15px;
            border: 1px solid #ccc;
            cursor: pointer;
            margin-top: 15px;
        }

        .tablinks.active {
            background-color: #ccc;
        }

        .account-details {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }


        .account-details h4 {
            margin-top: 0;
        }

        .copy-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 5px 10px;
            margin-left: 10px;
        }

        .copy-btn:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .col-lg-6 {
                max-width: 100%;
                padding: 0 3px;
            }

            .payment-tabs {
                text-align: left;
                margin-bottom: 20px;
            }

            .account-details {
                padding: 15px;
            }
            .account-details #bt1{
                position: absolute;
                top: 60px;
                right: 10px;
            }
            .account-details #bt2{
                position: absolute;
                top: 260px;
                right: 10px;
            }
        }
    </style>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function copyAccountNumber(type) {
            var accountNumber;
            if (type === 'local') {
                accountNumber = '2022481337'; // Replace with actual local account number
            } else if (type === 'dollar') {
                accountNumber = '2024481984'; // Replace with actual dollar account number
            }
            navigator.clipboard.writeText(accountNumber).then(function () {
                alert('Account number copied successfully: ' + accountNumber);
            }, function () {
                alert('Failed to copy account number');
            });
        }
    </script>

    @include('frontend.salvation')
@endsection
