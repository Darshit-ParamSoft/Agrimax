@extends('frontend.layouts.master')

@section('title', 'Contact Us - Agrimax')

@section('content')

<style>
    .main-contact-form{
        padding: 0px 0px 0px;
    }

    .location-info{
        padding: 20px 0px 0px;
    }

    .location-info__single-content{
        margin-top: 0px !important;
    }

    #contact-form button[type="submit"]:hover {
        background: linear-gradient(135deg, #6d4c41 0%, #795548 100%) !important;
        box-shadow: 0 6px 16px rgba(78, 52, 46, 0.4) !important;
        transform: translateY(-2px);
    }

    #contact-form button[type="submit"]:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(78, 52, 46, 0.3) !important;
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }

    .input-box input.error,
    .input-box textarea.error,
    .input-box select.error {
        border-color: #dc3545 !important;
        background-color: #fff5f5;
    }

    .input-box input,
    .input-box textarea,
    .input-box select {
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }
</style>

<!--Start breadcrumb Style1-->
        <section class="breadcrumb-style1">
            <div class="breadcrumb-style1-bg" style="background-image: url({{ asset('frontend/theme/assets/images/breadcrumb/breadcrumb-1.jpg') }});">
                <div class="breadcrumb-style1-bg__overlay"></div>
            </div>
            <div class="container">
                <div class="inner-content">
                    <div class="title">
                        <h2>Contact</h2>
                        <p>Rooted in Tradition, Growing for the Future.</p>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span class="icon-arrow"></span></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb Style1-->

       <!--Start Location Info -->
<section class="location-info">

    <div class="container">
        <div class="sec-title withtext text-center sec-title-animation animation-style2">
            <div class="sub-title">
                <div class="icon">
                    <i class="icon-hat"></i>
                </div>
                <h4>Contact Info</h4>
            </div>
            <h2 class="title-animation">Get In Touch</h2>
            <div class="text">
                <p>At Farmland Group, we prioritize excellent customer service, ensuring that your inquiries are
                    met with prompt <br> and professional support. Whether you need guidance on our products.
                </p>
            </div>
        </div>

        <div class="row" style="row-gap: 30px; align-items: stretch;">
    <!-- Left Side - Cards Column (4 columns) -->
    <div class="col-xl-4 col-lg-4" style="display: flex; flex-direction: column; height: 100%;">
        <!--Start Location Info Single-->
        <div class="location-info__single" style="flex: 1; display: flex; flex-direction: column;">
            <div class="location-info__single-content" style="flex: 1; padding: 30px;">
                <div class="location-info__single-content-title">
                    <h3 style="margin-bottom: 15px;">London Farm</h3>
                </div>
                <div class="location-info__single-content-text">
                    <p style="margin-bottom: 8px;">7256 Oakwood Lane IL 62704</p>
                    <p style="margin-bottom: 15px;"><a href="tel:80045678901">+4800 45 678 900</a></p>
                </div>
                <div class="location-info__single-content-btn">
                    <a href="#">Find On Map <span class="icon-arrow"></span></a>
                </div>
            </div>
        </div>
        <!--End Location Info Single-->

        <!--Start Location Info Single-->
        <div class="location-info__single" style="flex: 1; display: flex; flex-direction: column;">
            <div class="location-info__single-content" style="flex: 1; padding: 30px;">
                <div class="location-info__single-content-title">
                    <h3 style="margin-bottom: 15px;">New York Farm</h3>
                </div>
                <div class="location-info__single-content-text">
                    <p style="margin-bottom: 8px;">1432 Maple Drive, TX 73301</p>
                    <p style="margin-bottom: 15px;"><a href="tel:80045678901">+4800 45 678 900</a></p>
                </div>
                <div class="location-info__single-content-btn">
                    <a href="#">Find On Map <span class="icon-arrow"></span></a>
                </div>
            </div>
        </div>
        <!--End Location Info Single-->

        <!--Start Location Info Single-->
        <div class="location-info__single" style="flex: 1; display: flex; flex-direction: column;">
            <div class="location-info__single-content" style="flex: 1; padding: 30px;">
                <div class="location-info__single-content-title">
                    <h3 style="margin-bottom: 15px;">Los Angels Farm</h3>
                </div>
                <div class="location-info__single-content-text">
                    <p style="margin-bottom: 8px;">8814 Bayberry Ave, TN 37659</p>
                    <p style="margin-bottom: 15px;"><a href="tel:80045678901">+4800 45 678 900</a></p>
                </div>
                <div class="location-info__single-content-btn">
                    <a href="#">Find On Map <span class="icon-arrow"></span></a>
                </div>
            </div>
        </div>
        <!--End Location Info Single-->
    </div>

    <!-- Right Side - Contact Form Column (8 columns) -->
    <div class="col-xl-8 col-lg-8" style="display: flex; height: 100%;">
        <!-- Start Main Contact Form -->
        <div class="main-contact-form" style="width: 100%; display: flex; flex-direction: column;">
            <div class="main-contact-form__inner" style="flex: 1; padding: 40px; position: relative; overflow: hidden; height: 100%;">
                <div class="main-contact-form__shape-bg"
                    style="background-image: url({{ asset('frontend/theme/assets/images/shapes/main-contact-form-bg.jpg') }}); opacity: 0.1; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center;"></div>

                <div style="position: relative; z-index: 1; height: 100%; display: flex; flex-direction: column;">
                    <div class="sec-title sec-title-animation animation-style2" style="margin-bottom: 30px; margin-top: 0; padding-top: 0;">
                        <div class="sub-title" style="justify-content: flex-start;">
                            <div class="icon">
                                <i class="icon-hat"></i>
                            </div>
                            <h4 style="margin: 0;">Send Message</h4>
                        </div>
                        <h2 class="title-animation" style="text-align: left; margin-top: 10px;">Contact Us</h2>
                    </div>

                    <!--Start Main Contact Form-->
                    <div class="contact-form" style="flex: 1;">

                        <form id="contact-form" name="contact_form" class="default-form2 ajax-form"
                            action="{{ route('contact.store') }}" method="post" style="height: 100%; display: flex; flex-direction: column;">
                            @csrf
                            <div style="flex: 1;">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="input-box">
                                            <input type="text" name="form_name" id="formName"
                                                placeholder="Enter name here" value="{{ old('form_name') }}"
                                                class="@error('form_name') error @enderror">
                                            @error('form_name')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="input-box">
                                            <input type="text" name="form_phone" id="formPhone"
                                                placeholder="Phone number" value="{{ old('form_phone') }}"
                                                class="@error('form_phone') error @enderror">
                                            @error('form_phone')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="input-box">
                                            <input type="email" name="form_email" id="formEmail"
                                                placeholder="Email address" value="{{ old('form_email') }}"
                                                class="@error('form_email') error @enderror">
                                            @error('form_email')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="input-box">
                                            <div class="select-box clearfix">
                                                <select name="product" class="wide @error('product') error @enderror" style="width: 100%; padding: 15px;">
                                                    <option data-display="Select Product">Select Product</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}" {{ old('product') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('product')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="input-box">
                                            <textarea name="form_message" id="formMessage"
                                                placeholder="Message goes here..." style="min-height: 120px;"
                                                class="@error('form_message') error @enderror">{{ old('form_message') }}</textarea>
                                            @error('form_message')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="btn-box">
                                    <button type="submit" style="width: 100%; padding: 15px 25px; background: linear-gradient(135deg, #4e342e 0%, #6d4c41 100%); color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(78, 52, 46, 0.3); display: flex; align-items: center; justify-content: center; gap: 10px;">
                                        <span>Send Your Request</span>
                                        <i class="icon-angle-double-small-right" style="font-size: 14px;"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--End Main Contact Form-->
                </div>
            </div>
        </div>
        <!-- End Main Contact Form -->
    </div>
</div>
    </div>
</section>
<!--End Location Info -->


        <!--Start Map Style1-->
        <section class="map-style1" style="margin-top: 40px; border-top: 1px solid #f0f0f0;">
            <div class="map-style1__content text-center">
                <div class="title">
                    <h3>Berlin</h3>
                    <p>26 Maggie St, Little South <br>Slope, Berlin 10825. </p>
                </div>
                <div class="btn-box">
                    <a href="{{ route('contact-us.index') }}">
                        <i class="icon-thin-arrow"></i>
                        View on Map
                    </a>
                </div>
                <div class="phone-box">
                    <div class="icon">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="number">
                        <h3><a href="tel:66120003456">+66 12 000 3456</a></h3>
                    </div>
                </div>
            </div>
            <!--Google Map Start-->
            <div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="contact-page__map-box" allowfullscreen></iframe>
            </div>
            <!--Google Map End-->
        </section>
        <!--End Map Style1-->

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    // Clear all previous errors
    document.querySelectorAll('.error-message').forEach(el => el.remove());
    document.querySelectorAll('.error').forEach(el => el.classList.remove('error'));

    const formData = new FormData(this);

    fetch('{{ route("contact.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json().then(data => ({status: response.status, data: data})))
    .then(({status, data}) => {
        if (status === 200 && data.success) {
            // Show success message using global notification
            window.showNotification('Thank you for your inquiry. We will get back to you soon!', 'success', 5000);
            document.getElementById('contact-form').reset();
        } else if (status === 422 && data.errors) {
            // Display field-level errors
            Object.keys(data.errors).forEach(fieldName => {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.classList.add('error');
                    const errorMsg = document.createElement('span');
                    errorMsg.className = 'error-message';
                    errorMsg.textContent = data.errors[fieldName][0];
                    field.closest('.input-box') ? field.closest('.input-box').appendChild(errorMsg) : field.parentNode.appendChild(errorMsg);
                }
            });
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>

@endsection
