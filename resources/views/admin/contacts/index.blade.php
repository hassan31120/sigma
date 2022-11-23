@extends('admin.layouts.main')

@section('dash')
    التواصل
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                        <div class="col-6">
                            <h5 class="text-white text-capitalize ps-3" style="margin-right: 10px; font-weight: 700;">جدول
                                التواصل</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">

                        @if (count($contacts) > 0)
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            الإسم</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            الرقم</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            الايميل</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            الموضوع</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            الرساله</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                                            منذ</th>
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                            حذف</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0" style="margin-right:20px">
                                                    {{ $contact->name }}</p>
                                            </td>

                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $contact->number }}</span>
                                            </td>

                                            @isset($contact->email)
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $contact->email }}</span>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold">لا يوجد</span>
                                                </td>
                                            @endisset

                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $contact->subject }}</span>
                                            </td>

                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $contact->message }}</span>
                                            </td>

                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $contact->created_at->diffForhumans() }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <a href="{{ route('admin.contact.destroy', $contact->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Delete user"
                                                    onclick="return confirm('هل انت متأكد من حذف التواصل؟')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                <h2>لا يوجد تواصل</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
