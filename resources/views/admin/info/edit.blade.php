@extends('admin.layouts.main')
@section('dash')
    البيانات
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                        <div class="col-6">
                            <h5 class="text-white text-capitalize ps-3" style="margin-right: 10px">تعديل الإعدادات</h5>
                        </div>
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
                                                    <form action="{{ route('admin.info.update', $info->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="views"
                                                                        style="font-size: 18px">المشاهدات</label>
                                                                    <input type="number" name="views"
                                                                        value="{{ $info->views }}" id="views"
                                                                        class="form-control form-control-lg formborderCSS">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="customers"
                                                                        style="font-size: 18px">العملاء</label>
                                                                    <input type="number" name="customers"
                                                                        value="{{ $info->customers }}" id="customers"
                                                                        class="form-control form-control-lg formborderCSS">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="employees"
                                                                        style="font-size: 18px">الموظفين</label>
                                                                    <input type="number" name="employees"
                                                                        value="{{ $info->employees }}" id="employees"
                                                                        class="form-control form-control-lg formborderCSS">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="projects"
                                                                        style="font-size: 18px">مشاريع منتهية</label>
                                                                    <input type="number" name="projects"
                                                                        value="{{ $info->projects }}" id="projects"
                                                                        class="form-control form-control-lg formborderCSS">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="number"
                                                                        style="font-size: 18px">الرقم</label>
                                                                    <input type="text" name="number"
                                                                        value="{{ $info->number }}" id="number"
                                                                        class="form-control form-control-lg formborderCSS">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="form-outline">
                                                                    <label class="form-label" for="email"
                                                                        style="font-size: 18px">الايميل</label>
                                                                    <input type="email" name="email"
                                                                        value="{{ $info->email }}" id="email"
                                                                        class="form-control form-control-lg formborderCSS">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-4 pt-2 text-center">
                                                            <input class="btn btn-primary btn-lg" type="submit"
                                                                value="تعديل" />
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
