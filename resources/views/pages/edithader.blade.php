@extends('lyouts.master-admin')
@section('content-admin')
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3 class="orange-text" style="color: black">Edit Header</h3>
                </div>
            </div>
        </div>
        <div class="contact-from-section mt-30 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div id="form_status"></div>
                        <div class="contact-form">


                           <form method="post" action="/storhadersubtitle" id="fruitkha-contact" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $hader->id }}">

                                <!-- Subtitle -->
                                <div class="form-group">
                                    <input type="text" style="width: 100%" placeholder="Subtitle" name="subtitle" id="subtitle" value="{{ $hader->subtitle }}">
                                    <span class="text-danger">@error('subtitle') {{ $message }} @enderror</span>
                                </div>

                                <!-- Title -->
                                <div class="form-group">
                                    <input type="text" style="width: 100%" placeholder="Title" name="titel" id="titel" value="{{ $hader->titel }}">
                                    <span class="text-danger">@error('titel') {{ $message }} @enderror</span>
                                </div>

                                <!-- Button Radius and Width -->
                                <div class="form-group" style="display: flex; gap: 10px;">
                                    <input type="text" value="{{ $hader->bottun_rad }}" style="width: 50%" placeholder="Button Radius" name="bottun_rad" id="bottun_rad">
                                    <input type="text" value="{{ $hader->bottun_with }}" style="width: 50%" placeholder="Button Width" name="bottun_with" id="bottun_with">
                                    <span class="text-danger">@error('bottun_rad') {{ $message }} @enderror</span>
                                    <span class="text-danger">@error('bottun_with') {{ $message }} @enderror</span>
                                </div>

                                <!-- Image Upload -->
                                <div class="form-group">
                                    <input type="file" name="imagpath" id="imagpath" class="form-control">
                                    <span class="text-danger">@error('imagpath') {{ $message }} @enderror</span>
                                </div>

                                <!-- Current Image Display -->
                                <div class="form-group">
                                    <img class="homepage-bg-1" src="{{ asset($hader->imagpath) }}" width="100" height="100" alt="">
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <input type="submit" value="Edit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection

