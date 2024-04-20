@extends('admin.layouts.master')

@push('after-styles')
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }

    </style>
@endpush

@section('content')

    <div class="w-full mt-8 pb-10 p-6">
        <div class="bcs__card">
            <div class="flex justify-between items-center bcs__card__header">
                <div class="text-2xl font bold">{{ !empty($user) ? 'Update' : 'Create New' }} User</div>
            </div>
            <div class="bcs__card__body overflow-auto">
                <form action="{{ !empty($user)? route('admin.user.update', $user->id): route('admin.user.store')  }}" method="POST" enctype="multipart/form-data">
                    @if(!empty($user))
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="w-full">
                        <div class="px-0">
                            <div class="flex flex-col md:flex-row justify-between gap-y-2 md:gap-y-0 gap-x-4 mt-4">
                                <div class="mt-1 w-full md:w-4/12">
                                    <div class="required">Name</div>
                                    <input class="w-full px-4 py-1.5 border border-gray-300 rounded-md text-gray-900 focus:outline-none mt-1 placeholder:text-sm"
                                           name="name" type="text" placeholder="Name" value="{{ !empty($user) ? $user->name : old('name') }}">
                                    @error('name')
                                    <span class="text-red-500" >{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-1 w-full md:w-4/12" >
                                    <div class="">Email</div>
                                    <input class="w-full px-4 py-1.5 border border-gray-300 rounded-md text-gray-900 focus:outline-none mt-1 placeholder:text-sm"
                                           name="email" type="email" placeholder="Email" value="{{ !empty($user) ? $user->email : old('email') }}">
                                    @error('email')
                                    <span class="text-red-500" >{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-1 w-full md:w-4/12" >
                                    <div class="required">Phone Number</div>
                                    <input class="w-full px-4 py-1.5 border border-gray-300 rounded-md text-gray-900 focus:outline-none mt-1 placeholder:text-sm"
                                           name="phone" type="number" placeholder="Phone Number"
                                           min="0" oninput="validity.valid||(value='');" onwheel="this.blur()" value="{{ !empty($user) ? $user->phone : old('phone') }}">
                                    @error('phone')
                                    <span class="text-red-500" >{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row justify-between gap-y-2 md:gap-y-0 gap-x-4 mt-4">
                                <div class="mt-1 w-full md:w-4/12">
                                    <div class="required">Role</div>
                                    <input class="w-full px-4 py-1.5 border border-gray-300 rounded-md text-gray-900 focus:outline-none mt-1 placeholder:text-sm"
                                           name="role" type="text" placeholder="Role" value="{{ !empty($user) ? $user->role : old('role') }}">
                                    @error('role')
                                    <span class="text-red-500" >{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-1 w-full md:w-4/12">
                                    <div class="required">Address</div>
                                    <input class="w-full px-4 py-1.5 border border-gray-300 rounded-md text-gray-900 focus:outline-none mt-1 placeholder:text-sm"
                                           name="address" type="text" placeholder="Address" value="{{ !empty($user) ? $user->address : old('address') }}">
                                </div>

                                <div class="mt-1 w-full md:w-4/12">
                                    <div class="required">Status</div>
                                    <div class="flex gap-x-6 mt-1">
                                        <div class="flex items-center py-1 gap-x-4">
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="status" class="w-5 h-5 text-teal-600 form-radio" value="{{ \App\Enums\UserEnum::STATUS_ACTIVE }}" {{ empty($user) || $user->status == \App\Enums\UserEnum::STATUS_ACTIVE ? 'checked' : '' }}  >
                                                <span class="ml-2 text-gray">Active</span>
                                            </label>
                                        </div>
                                        <div class="flex items-center py-1 gap-x-4">
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="status" class="w-5 h-5 text-teal-600 form-radio" value="{{ \App\Enums\UserEnum::STATUS_INACTIVE }}" {{ !empty($user) && $user->status == \App\Enums\UserEnum::STATUS_INACTIVE ? 'checked' : '' }}>
                                                <span class="ml-2 text-gray">Inactive</span>
                                            </label>
                                        </div>
                                        <div class="flex items-center py-1 gap-x-4">
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="status" class="w-5 h-5 text-teal-600 form-radio" value="{{ \App\Enums\UserEnum::STATUS_BLOCK }}" {{ !empty($user) && $user->status == \App\Enums\UserEnum::STATUS_BLOCK ? 'checked' : '' }}>
                                                <span class="ml-2 text-gray">Block</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="w-full">
                            <div class="flex w-full mt-8 justify-end">
                                <div class="flex gap-3">
                                        <div class="flex min-w-fit items-center px-4 cursor-pointer rounded-md bg-red-600 hover:bg-red-700 text-white transition-all w-full py-1.5 justify-center gap-x-2">
                                            <i class="fa-solid fa-xmark"></i>
                                            <a href="{{ route('admin.user.index') }}" class="flex items-center cursor-pointer justify-center">
                                                Cancel
                                            </a>
                                        </div>
                                    <button type="submit" class="flex min-w-fit items-center px-4 cursor-pointer rounded-md bg-green-600 hover:bg-green-700 text-white transition-all w-full py-1.5 justify-center gap-x-2">
                                        <i class="fa-regular fa-square-check"></i>
                                        {{ !empty($user) ? 'Update' : 'Save' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('after-scripts')



@endpush
