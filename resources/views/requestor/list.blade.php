@extends('layout.contentLayoutMaster')

@section('title', 'Requestor')

@section('content')


    <h5 class="py-3">
        <span class="text-muted fw-light">Requestor /</span> List
    </h5>

    <div class="row">

        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Requestor List</h5>
                </div>

                <form action="" method="get">
                    <div class="px-3 pb-3 float-end d-flex align-items-center gap-3">

                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-filter-alt'></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="px-2">
                                    <select name="filter_is_graduated" id="filter_is_graduated" class="form-select">
                                        <option value="" {{ is_null($filterGraduate) ? 'selected': '' }}>Is Graduate?</option>
                                        <option value="1" {{ $filterGraduate == true ? 'selected': '' }}>Yes</option>
                                        <option value="0" {{ $filterGraduate == false ? '': 'selected' }}>No</option>
                                    </select>
                                </li>
                                <li class="mt-2 px-2">
                                    <select name="filter_education_level" id="filter_education_level" class="form-select">
                                        <option value="" {{ is_null($filterEducation) ? 'selected': '' }}>Education Level</option>
                                        @foreach ($programs as $program)
                                            <optgroup label="{{ $program['level_name'] }}">
                                                @foreach($program['major_names'] as $major)
                                                    <option value="{{ $major['id'] }}" 
                                                        @if($major['id'] == $filterEducation)
                                                            selected
                                                        @endif
                                                    >
                                                    {{ ucwords($major['name']) }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="px-2">
                                    <button type="submit" class="btn btn-success w-100 text-center">Filter</button>
                                </li>
                            </ul>
                        </div>
                        <!-- <div>
                            <button class="btn btn-outline-secondary">
                                <i class='bx bx-filter-alt'></i>
                            </button>
                        </div> -->
                        <div class="input-group input-group-merge">
                            <input type="search" class="form-control" name="search" id="search" placeholder="Search" value="{{ $search }}">
                            <span class="input-group-text cursor-pointer" id="search-icon">
                                <i class='bx bx-search-alt'></i>
                            </span>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="border-top">
                            <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Major</th>
                                <th>Is Graduate</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                    @forelse ($requestors as $requestor)
                              
                                    <td>{{ $requestor->id_number }}</td>
                                    <td>{{ $requestor->full_name_last_name_first }}</td>
                                    <td>{{ $requestor->major_name }}</td>
                                    <td>
                                        {!! $requestor->pretty_text_is_graduated !!}
                                    </td>
                                    <td>
                                        <a href={{ route('requestors.show', $requestor->id) }} class="text-primary fs-5">
                                            <i class='bx bx-show'></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Record</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="px-3 pt-3 float-end">
                        {{ $requestors->links() }}
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
