@extends('admin.layouts.main')

@section('dash')
    المشاريع البرمجية
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                        <div class="col-6">
                            <h5 class="text-white text-capitalize ps-3" style="margin-right: 10px">إضافة مشروع جديد</h5>
                        </div>
                        <div class="col-6" style="position: relative;"><a href="{{ route('admin.apps') }}"
                                style="position: absolute; left: 2%" class="btn btn-primary">عرض المشاريع</a></div>
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
                                                    <form action="{{ route('admin.app.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="title"
                                                                        style="font-size: 18px">الإسم</label>
                                                                    <input type="text" name="title" id="title"
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
                                                                    <label class="form-label" for="body"
                                                                        style="font-size: 18px">الوصف</label>
                                                                    <textarea name="body" id="body" class="form-control form-control-lg formborderCSS" rows="5" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="image"
                                                                        style="font-size: 18px">الصورة</label>
                                                                    <input type="file" name="image" id="image"
                                                                        class="form-control form-control-lg formborderCSS"
                                                                        required />
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
                                                            <label class="form-label text-center"
                                                                style="font-size: 18px">الفائدة</label>
                                                            <div class="col-md-8 mb-4">
                                                                <div class="form-outline">
                                                                    <textarea class="form-control form-control-lg formborderCSS" name="b_head" id="b_head" cols="30"
                                                                        rows="1" required placeholder="المقدمة"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="form-outline">
                                                                    <input type="file" name="b_image" id="b_image"
                                                                        class="form-control form-control-lg formborderCSS"
                                                                        required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <textarea name="b_body" id="summernote" cols="30" rows="5"
                                                                        class="form-control form-control-lg formborderCSS" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="pages"
                                                                        style="font-size: 18px"> صفحات مكتملة </label>
                                                                    <input type="number" name="pages" id="pages"
                                                                        class="form-control form-control-lg formborderCSS" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="downlaods"
                                                                        style="font-size: 18px"> عدد التحميلات </label>
                                                                    <input type="number" name="downlaods" id="downlaods"
                                                                        class="form-control form-control-lg formborderCSS" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="customers"
                                                                        style="font-size: 18px"> عميل راضي </label>
                                                                    <input type="number" name="customers" id="customers"
                                                                        class="form-control form-control-lg formborderCSS" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="country"
                                                                        style="font-size: 18px"> بلد متاحة </label>
                                                                    <input type="number" name="country" id="country"
                                                                        class="form-control form-control-lg formborderCSS" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="images"
                                                                        style="font-size: 18px">الصور</label>
                                                                    <input type="file" name="images" id="images"
                                                                        class="form-control form-control-lg formborderCSS"
                                                                        multiple>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <div class="row">
                                                            <label class="form-label text-center"
                                                                style="font-size: 18px">رأي العميل</label>
                                                            <div class="col-md-8 mb-4">
                                                                <div class="form-outline">
                                                                    <textarea class="form-control form-control-lg formborderCSS" name="c_name" id="c_name" cols="30"
                                                                        rows="1" required placeholder="اسم العميل"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                <div class="form-outline">
                                                                    <input type="file" name="c_logo" id="c_logo"
                                                                        class="form-control form-control-lg formborderCSS"
                                                                        required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <textarea name="c_body" id="c_body" cols="30" rows="5"
                                                                        class="form-control form-control-lg formborderCSS" placeholder="رأي العميل" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="cat_id"
                                                                        style="font-size: 18px">القسم</label>
                                                                    <select name="cat_id" id="cat_id"
                                                                        class="form-control form-control-lg formborderCSS">
                                                                        @foreach ($cats as $cat)
                                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                                        @endforeach
                                                                    </select>
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
