@section('page-title')
    Admins Control
@endsection


@extends('backend.layouts.main')

@section('admin-section')
@include('backend.layouts.partials.alerts')
<a href="{{ route('dashboard.admins.create') }}" style="max-width: 220px" class="button mt-8 w-100 mr-2 mb-2 flex bg-theme-1 text-white"> <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Create a New Admin </a>
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-no-wrap" width="10%"></th>
                <th class="whitespace-no-wrap">USER NAME</th>
                <th class="text-center whitespace-no-wrap">ROLES</th>
                <th class="text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($admins as $admin)
            <tr class="intro-x">
                <td class="w-40">
                    <div class="flex">
                        <div class="w-10 h-10 image-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-admins mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        
                    </div>
                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $admin->name }}</span> 
                    <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $admin->email }}</div>
                </td>
                <td class="text-center">
                    @foreach ($admin->roles as $role)
                    <span class="py-0 px-2 rounded-full text-xs bg-green-200 text-gray-600 cursor-pointer ml-auto truncate">{{$role->name}}</span>
                    @endforeach

                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" href="{{ route('dashboard.admins.edit', $admin->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>

                        <a class="flex items-center text-theme-6" href="{{ route('dashboard.roles.destroy', $admin->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit()"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                        <form id="delete-form-{{$admin->id}}" action="{{ route('dashboard.admins.destroy', $admin->id) }}" method="POST" style="display: none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection