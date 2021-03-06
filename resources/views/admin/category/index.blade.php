@extends('admin.layout.app')

@section('title')
    {{ __('List Category') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">{{ __('List Category') }}</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Slug') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th><a class="btn btn-sm btn-success" href="{{ route('admin.category.create') }}"
                                        value="">{{ __('Add') }}</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td> <a class="btn btn-sm btn-warning"
                                            href="{{ route('admin.category.edit', $category->id) }}">{{ __('Edit') }}
                                        </a> &nbsp;
                                        <input id="deleteElement"
                                            data-url="{{ route('admin.category.destroy', $category->id) }}"
                                            data-name="{{ $category->name }}" type="submit"
                                            class="btn btn-sm btn-danger" value="{{ __('Remove') }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script src="{{ asset('bower_components/toastr/toastr.js') }}"></script>
    <script src="{{ asset('bower_components/jquery.i18n/src/jquery.i18n.js') }}"></script>
    <script src="{{ asset('bower_components/jquery.i18n/src/jquery.i18n.messagestore.js') }}"></script>
    <script src="{{ asset('js/confirm-remove.js') }}"></script>
@endsection
