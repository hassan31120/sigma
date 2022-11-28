@extends('admin.layouts.main')

@section('dash')
    المنتجات
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                        <div class="col-6">
                            <h5 class="text-white text-capitalize ps-3" style="margin-right: 10px">إضافة منتج جديد</h5>
                        </div>
                        <div class="col-6" style="position: relative;"><a href="{{ route('admin.products') }}"
                                style="position: absolute; left: 2%" class="btn btn-primary">عرض المنتجات</a></div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class=" container-fluid">
                            <!--form section-->
                            <section class="vh-100 gradient-custom sectionFormDIR">
                                <div class="container py-5 h-100">
                                    <div class="row justify-content-center align-items-center h-100">
                                        <div class="col-12 col-lg-9 col-xl-7">
                                            <div class="card shadow-2-strong card-registration"
                                                style="border-radius: 15px;">
                                                <div class="card-body p-4 p-md-5">
                                                    <form action="{{ route('admin.product.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="title"
                                                                        style="font-size: 18px">العنوان</label>
                                                                    <input type="text" name="title" id="title"
                                                                        class="form-control form-control-lg formborderCSS"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="form-label" style="font-size: 18px">الوصف</label>
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <textarea name="desc" id="summernote" cols="30" rows="5"
                                                                        class="form-control form-control-lg formborderCSS" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="form-label"
                                                                style="font-size: 18px">المميزات</label>
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <textarea name="ads" id="summernote1" cols="30" rows="5"
                                                                        class="form-control form-control-lg formborderCSS" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="ref1"
                                                                        style="font-size: 18px">لينك جوجل بلاي</label>
                                                                    <input type="text" name="ref1" id="ref1"
                                                                        class="form-control form-control-lg formborderCSS" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="ref2"
                                                                        style="font-size: 18px">لينك ابب ستور</label>
                                                                    <input type="text" name="ref2" id="ref2"
                                                                        class="form-control form-control-lg formborderCSS" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="ref3"
                                                                        style="font-size: 18px">لينك الموقع </label>
                                                                    <input type="text" name="ref3" id="ref3"
                                                                        class="form-control form-control-lg formborderCSS" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="image"
                                                                        style="font-size: 18px">الصورة</label>
                                                                    <input type="file" name="image" id="image"
                                                                        class="form-control form-control-lg formborderCSS"
                                                                        required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="price"
                                                                        style="font-size: 18px">السعر</label>
                                                                    <input type="text" name="price" id="price"
                                                                        class="form-control form-control-lg formborderCSS"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="image"
                                                                        style="font-size: 18px">القسم</label>
                                                                    <select name="cat_id" id="cat_id"
                                                                        class="form-control form-control-lg formborderCSS mb-5"
                                                                        required>
                                                                        @foreach ($cats as $cat)
                                                                            <option value="{{ $cat->id }}">
                                                                                {{ $cat->name }}</option>
                                                                        @endforeach
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-4 pt-2 text-center">
                                                            <input class="btn btn-primary btn-lg" type="submit"
                                                                value="إضافة" />
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--endform section-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
