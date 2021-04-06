@section('page-title')
    Roles Control
@endsection


@extends('backend.layouts.main')

@section('admin-section')
@include('backend.layouts.partials.alerts')
<div class="intro-y box mt-5">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Create Role
        </h2>
    </div>
    <div class="p-5" id="horizontal-form">
        <form action="{{ route('dashboard.roles.store') }}" method="POST">
            @csrf
            <div class="preview" style="">
                <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full sm:w-20 sm:text-right sm:mr-5">Role Name</label>
                    <input type="text" class="input w-full border mt-2 flex-1" placeholder="Admin" name="name">
                </div>

                <div class="flex flex-col sm:flex-row items-center">
                    <label class="w-full sm:w-20 sm:text-right sm:mr-5">Guard Name</label>
                    <div class="mt-2">
                        <select class="input input--lg border mr-2" name="guard">
                            <option value="admin">admin</option>
                            <option value="web">web</option>
                        </select>
                    </div>
                </div>

                
                
                @foreach ($permissions as $item)
                    <div class="flex items-center text-gray-700 mt-5 sm:ml-20 sm:pl-5">
                        <input type="checkbox" class="input border mr-2" value="{{ $item->name }}" name="permissions[]" id="permission-{{ $loop->index }}">
                        <label class="cursor-pointer select-none" for="permission-{{ $loop->index }}">{{ $item->name }} <small class="text-white rounded-full px-1 report-box__indicator bg-theme-18 tooltip cursor-pointer tooltipstered">{{ $item->guard_name }}</small></label>
                    </div>
                @endforeach
                <div class="sm:ml-20 sm:pl-5 mt-5">
                    <input type="submit" class="button bg-theme-1 text-white" value="Create" />
                </div>
            </div>    
        </form>    
    </div>
</div>
@endsection