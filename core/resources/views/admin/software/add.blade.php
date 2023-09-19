@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-10">
           

            <div class="row mb-30">
                <div class="col-lg-12 mt-2">
                    <div class="card border--dark">
                        <h5 class="card-header bg--dark">@lang('Add Product')</h5>
                        <div class="card-body">
                            <form class="user-profile-form" action="{{route('admin.software.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf                       <div class="card custom--card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                                <h4 class="card-title mb-0">
                                    Add Product                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="card-form-wrapper">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-lg-12 form-group">
                                            <label>Product Type*</label>
                                            <select class="form-control bg--gray" name="product_type" id="product_type">
                                                    <option selected="" disabled="">Select Product Type</option>
                                                                                                    <option value="1" selected="">Real Product</option>
                                                                                                    <option value="2">Digital Product</option>
                                                                                                    <option value="3">Training</option>
                                                                                                    <option value="4">Course</option>
                                                                                            </select>
                                        </div>
                                 
                                        <div class="col-xl-6 col-lg-6 form-group conditional-div">
                                            <div class="image-upload">
                                                <div class="thumb">
                                                    <div class="avatar-preview">
                                                        <div class="profilePicPreview bg_img" data-background="{{ getImage('/') }}">
                                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="avatar-edit">
                                                        <input type="file" class="profilePicUpload" name="image" id="profilePicUpload2" accept=".png, .jpg, .jpeg"
                                                            required="">
                                                        <label for="profilePicUpload2" style="background: linear-gradient(to right, #2cdd9b 0%, #1dc8cc 100%);"  class="text-light" >@lang('Image')</label>
                                                        <small>@lang('Supported files'): @lang('jpeg'), @lang('jpg'), @lang('png'). @lang('Image will be resized into 590x300 px')</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" id="screen_div" style="display: block;">
                                            <div class="card custom--card p-0 mb-3">
                                                <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                                                    <h4 class="card-title mb-0" id="screenshot_title">Pictures and Media</h4>
                                                    <div class="card-btn">
                                                        <button type="button" class="btn--base addExtraImage"><i class="las la-plus"></i> Add New</button>
                                                    </div>
                                                </div>
                                                <div class="card-body addImage">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-xl-12 col-lg-12 form-group conditional-div" style="display: block;">
                                            <label>Title*</label>
                                            <input type="text" name="title" maxlength="255" value="" class="form-control" placeholder="Enter Title" required="">
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" style="display: block;">
                                            <label>Category*</label>
                                            <select class="form-control bg--gray" name="category" id="category">
                                                    <option selected="" disabled="">Select Category</option>
                                                                                                    <option value="2">Product Category</option>
                                                 
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" style="display: block;">
                                            <label for="subCategorys">Sub Category</label>
                                                <select name="subcategory" class="form-control mySubCatgry" id="subCategorys">
                                                </select>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" id="feature_div" style="display: none;">
                                            <label>Include Feature*</label>
                                                                                            <div class="form-group custom-check-group">
                                                    <input type="checkbox" name="features[]" id="1" value="1">
                                                    <label for="1">تضمين ملف المصدر وجميع البيانات</label>
                                                </div>
                                                                                    </div>

                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" id="product_code_div" style="display: block;">
                                            <label>Product Code*</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control checkProductCode" name="product_code" value="" placeholder="Enter Product Code" required="">
                                                
                                            </div>
                                            <small class="text-danger product_codeExits">Product Code is Already Taken!</small>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" style="display: block;">
                                            <label>Price*</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="amount" value="" placeholder="Enter Price" required="">
                                            <span class="input-group-text" id="basic-addon2">USD</span>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group conditional-div select2Tag" id="tag_div" style="display: none;">
                                            <label>Tag*</label>
                                            <select class="form-control select2" name="tag[]" multiple="multiple">
                                            </select>
                                            <small>Tag and enter press</small>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group conditional-div select2Tag" id="file_div" style="display: none;">
                                            <label>File Include*</label>
                                            <select class="form-control select2" name="file_include[]" multiple="multiple">
                                            </select>
                                            <small>File and enter press</small>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" id="demo_div" style="display: none;">
                                            <label>Demo Url*</label>
                                            <input type="text" name="url" maxlength="255" value="" class="form-control" placeholder="Enter url">
                                            <small>https://example.com/</small>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 form-group conditional-div" id="document_div" style="display: none;">
                                            <label>Documentation File*</label>
                                            <div class="custom-file-wrapper">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="document" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <small>Supported file: only pdf file</small>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 form-group conditional-div" id="zip_div" style="display: none;">
                                            <label>Add Product*</label>
                                            <div class="custom-file-wrapper">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="uploadSoftware" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <small>Supported file: only zip file</small>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 form-group conditional-div" id="verities_div" style="display: block;">
                                            <div class="card custom--card p-0 mb-3">
                                                <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                                                    <h4 class="card-title mb-0">
                                                        Product Verities(Verities in different size and color)                                                    </h4>
                                                    <div class="card-btn">
                                                        <button type="button" class="btn--base addExtraVerities"><i class="las la-plus"></i> Add New</button>
                                                    </div>
                                                </div>
                                                <div class="card-body addVerities">
                                                    <div class="custom-file-wrapper removeVerities">
                                                        <div class="row">
                                                            <div class="col-xl-7 col-lg-7 col-md-7">
                                                                <input type="text" name="product_name[]" id="prdname" value="" class="form-control" placeholder="Product Name" required="">
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-md-3">
                                                                <input type="text" name="inventory[]" id="prdqty" value="" class="form-control" placeholder="Inventory" required="">
                                                            </div>
                                                            <div class="col-xl-2 col-lg-2 col-md-2">
                                                                <button class="btn btn--danger text-white border--rounded removeExtraVerities"><i class="fa fa-times"></i></button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 form-group conditional-div">
                                            <label>@lang('Description')*</label>
                                            <textarea class="form-control bg--gray nicEdit" name="description">{{old('description')}}</textarea>
                                        </div>

                                        <div class="col-xl-12 form-group conditional-div" style="display: block;">
                                            <button type="submit" class="submit-btn mt-20 w-100" style="background: linear-gradient(to right, #2cdd9b 0%, #1dc8cc 100%);">Add Product</button>
                                        </div>
                                        
                                        <div id="coming_soon" style="display:none">
                                            <h4 class="card-title mb-0">
                                                Coming Soon...                                            </h4>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>

               
            </div>

          

           
        </div>
    </div>
@endsection

@push('style')
<style>
    .select2Tag input{
        background-color: transparent !important;
        padding: 0 !important;
    }
</style>
<style>
    .custom-file-wrapper .custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    margin-bottom: 0;
    width: calc(100% - 40px);
    margin: 5px 0;
}
.custom-file-wrapper .custom-file .custom-file-label {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-weight: 500;
    line-height: 1.5;
    color: #606975;
    font-weight: 500;
    background-color: white;
    border: 1px solid #e1e7ec;
    border-radius: 0.25rem;
}
label {
    font-size: 14px;
    color: #606975;
    font-family: "Maven Pro", sans-serif;
    font-weight: 500;
    margin-bottom: 10px;
    display: block;
}
.custom--card .card-body .card-form-wrapper input {
    background-color: #f9f9f9;
    border-radius: 3px;
    padding: 10px 15px;
}
.custom-file-wrapper .custom-file input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    margin: 0;
    opacity: 0;
}
</style>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/select2.min.css')}}">
@endpush
@push('script-lib')
    <script src="{{asset($activeTemplateTrue.'frontend/js/select2.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/nicEdit.js')}}"></script>
@endpush


@push('script')
<script>
    "use strict";
    function proPicURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var preview = $('.profilePicPreview');
                $(preview).css('background-image', 'url(' + e.target.result + ')');
                $(preview).addClass('has-image');
                $(preview).hide();
                $(preview).fadeIn(650);
              
            }
           
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".profilePicUpload").on('change', function () {
       
        proPicURL(this);
    });

    
    // $(document).ready(function() {
    //     $('.select2').select2({
    //         tags: true
    //     });
    //     var html = `
    //             <div class="custom-file-wrapper removeVerities">
    //                 <div class="col-xl-7 col-lg-7">
    //                     <input type="text" name="product_name[]" id="prdname" maxlength="255" value="" class="form-control" placeholder="@lang("Product Name")" >
    //                 </div>
    //                 <div class="col-xl-3 col-lg-3">
    //                     <input type="text" name="inventory[]"  id="prdqty" maxlength="255" value="" class="form-control" placeholder="@lang("Inventory")">
    //                 </div>
    //                 <div class="col-xl-2 col-lg-2">
    //                     <button class="btn btn--danger text-white border--rounded removeExtraVerities"><i class="fa fa-times"></i></button>
    //                 </div>
    //             </div>`;
    //     $('.addVerities').append(html);
    // });

    $(".remove-image").on('click', function () {
        $(".profilePicPreview").css('background-image', 'none');
        $(".profilePicPreview").removeClass('has-image');
    })

    $(document).on('click', '.removeBtn', function () {
        $(this).closest('.extraServiceRemove').remove();
    });

    $('.addExtraImage').on('click',function(){
        var html = `
                <div class="custom-file-wrapper removeImage">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="screenshot[]" id="customFile" required>
                        <label class="custom-file-label" for="customFile">@lang('Choose file')</label>
                    </div>
                    <button class="btn btn--danger text-white border--rounded removeExtraImage"><i class="fa fa-times"></i></button>
                </div>`;
        $('.addImage').append(html);
    });

    $(document).on('click', '.removeExtraImage', function (){
        $(this).closest('.removeImage').remove();
    });

    $('.addExtraVerities').on('click',function(){
        var html = `
                <div class="custom-file-wrapper removeVerities mt-3">
                    <div class="row">
                    <div class="col-xl-7 col-lg-7">
                        <input type="text" name="product_name[]" maxlength="255" value="" class="form-control" placeholder="@lang("Product Name")" required="">
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <input type="text" name="inventory[]" maxlength="255" value="" class="form-control" placeholder="@lang("Inventory")" required="">
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <button class="btn btn--danger text-white border--rounded removeExtraVerities"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                </div>`;
        $('.addVerities').append(html);
    });

    $(document).on('click', '.removeExtraVerities', function (){
        $(this).closest('.removeVerities').remove();
    });

    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
    });

    (function($){
        $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
            $('.nicEdit-main').focus();
        });
    })(jQuery);


    $(document).on("change",".custom-file-input",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


    $('#category').on('change', function(){
        var category = $(this).val();
        console.log(category);
            $.ajax({
                type:"GET",
                url:"{{route('user.category')}}",
                data: {category : category},
                success:function(data){
                    var html = '';
                    if(data.error){
                        $("#subCategorys").empty(); 
                        html += `<option value="" selected disabled>${data.error}</option>`;
                        $(".mySubCatgry").html(html);
                    }
                    else{
                        $("#subCategorys").empty(); 
                        html += `<option value="" selected disabled>@lang('Select Sub Category')</option>`;
                        $.each(data, function(index, item) {
                            html += `<option value="${item.id}">${item.name}</option>`;
                            $(".mySubCatgry").html(html);
                        });
                    }
                }
        });   
    });
    $(".conditional-div").css("display", "block");
    $("#product_code_div").css("display", "block");
    $("#screenshot_title").text("Pictures and Media");
    $("#feature_div").css("display", "none");
    $("#tag_div").css("display", "none");
    $("#file_div").css("display", "none");
    $("#demo_div").css("display", "none");
    $("#document_div").css("display", "none");
    $("#zip_div").css("display", "none");
    $("#verities_div").css("display","block");
    $("#prdname").prop('required',true);
    $("#prdqty").prop('required',true);
    $("#coming_soon").css("display", "none");
    $('#product_type').on('change', function(){
        var product_type = $(this).val();
        if(product_type==1){
            $(".conditional-div").css("display", "block");
            $("#product_code_div").css("display", "block");
            $("#screenshot_title").text("Pictures and Media");
            $("#feature_div").css("display", "none");
            $("#tag_div").css("display", "none");
            $("#file_div").css("display", "none");
            $("#demo_div").css("display", "none");
            $("#document_div").css("display", "none");
            $("#zip_div").css("display", "none");
            $("#verities_div").css("display","block");
            $("#prdname").prop('required',true);
            $("#prdqty").prop('required',true);
            $("#coming_soon").css("display", "none");
        }else if(product_type==2){
            $(".conditional-div").css("display", "block");
            $("#product_code_div").css("display", "none");
            $("#screenshot_title").text("Screenshot");
            $("#feature_div").css("display", "block");
            $("#tag_div").css("display", "block");
            $("#file_div").css("display", "block");
            $("#demo_div").css("display", "block");
            $("#document_div").css("display", "block");
            $("#zip_div").css("display", "block");
            $("#verities_div").css("display","none");
            $("#coming_soon").css("display", "none");
            $("#prdname").prop('required',false);
            $("#prdqty").prop('required',false);
        }else if(product_type==3){
            $("#product_code_div").css("display", "none");
            $(".conditional-div").css("display", "none");
            $("#coming_soon").css("display", "block");
        }else if(product_type==4){
            $("#product_code_div").css("display", "none");
            $(".conditional-div").css("display", "none");
            $("#coming_soon").css("display", "block");
        }
            
    });
    $('.checkProductCode').on('focusout',function(e){
                var url = '{{ route('user.seller.checkProductCode') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                var data = {product_code:value,_token:token};
                $.post(url,data,function(response) {
                  if (response['is_exist'] == true) {
                      $('.product_codeExits').text('Product Code is Already Taken!');
                  }else{
                    $('.product_codeExits').text('')
                  }
                });
            });

</script>
@endpush