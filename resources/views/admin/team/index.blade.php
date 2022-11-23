@extends('admin.layouts.main')

@section('dash')
    الفريق
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                        <div class="col-6">
                            <h5 class="text-white text-capitalize ps-3" style="margin-right: 10px; font-weight: 700;">جدول
                                الفريق</h5>
                        </div>
                        <div class="col-6" style="position: relative;"><a href="{{ route('admin.team.create') }}"
                                style="position: absolute; left: 2%" class="btn btn-primary">إضافة عضو جديد</a></div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">

                        @if (count($teams) > 0)
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            الإسم</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                            الصورة</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            الوظيفة</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            لينكدان</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            فيسبوك</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            انستاجرام</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            تويتر</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                            تعديل</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                            حذف</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0" style="margin-right:20px">
                                                    {{ $team->name }}</p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0" style="margin-right:20px">
                                                    <img class="img-thumbnail" src="{{ asset($team->image) }}"
                                                        height="120" width="160" alt="team">
                                                </p>
                                            </td>

                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $team->job }}</span>
                                            </td>

                                            @isset($team->linkedin)
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold"><a
                                                            href="{{ $team->linkedin }}" target="_blank">اضغط هنا</a></span>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold">لا يوجد</span>
                                                </td>
                                            @endisset

                                            @isset($team->facebook)
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold"><a
                                                            href="{{ $team->facebook }}" target="_blank">اضغط هنا</a></span>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold">لا يوجد</span>
                                                </td>
                                            @endisset

                                            @isset($team->instagram)
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold"><a
                                                            href="{{ $team->instagram }}" target="_blank">اضغط هنا</a></span>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold">لا يوجد</span>
                                                </td>
                                            @endisset

                                            @isset($team->twitter)
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold"><a
                                                            href="{{ $team->twitter }}" target="_blank">اضغط هنا</a></span>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold">لا يوجد</span>
                                                </td>
                                            @endisset

                                            <td class="align-middle text-center">
                                                <a href="{{ route('admin.team.edit', $team->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('admin.team.destroy', $team->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Delete user"
                                                    onclick="return confirm('هل انت متأكد من حذف عضو الفريق؟')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                <h2>لا يوجد اعضاء فريق</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
