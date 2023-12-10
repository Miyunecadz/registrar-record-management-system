@extends('layout.contentLayoutMaster')

@section('title', 'Student | List')

@section('content')


    <h5 class="py-3">
        <span class="text-muted fw-light">Student /</span> List
    </h5>

    <div class="row">

        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student List</h5>
                </div>
                <div class="table-responsive">

                    <div class="px-3 pb-3 float-end d-flex align-items-center gap-3">
                        <div>
                            <button class="btn btn-outline-secondary">
                                <i class='bx bx-filter-alt'></i>
                            </button>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="search" class="form-control" id="search" placeholder="Search">
                            <span class="input-group-text cursor-pointer" id="search-icon">
                                <i class='bx bx-search-alt'></i>
                            </span>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead class="border-top">
                            <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Year Level</th>
                                <th>Major</th>
                                <th>Is Graduate</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->id_number }}</td>
                                    <td>{{ $student->full_name_last_name_first }}</td>
                                    <td>{{ $student->getLatestEducation()?->year_level ?? '-' }}</td>
                                    <td>{{ $student->getLatestEducation()?->major->name ?? '-' }}</td>
                                    <td>
                                        <span
                                            class="badge rounded-pill bg-label-success">{{ $student->getLatestEducation()?->prettyIsGraduated() }}</span>
                                    </td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('students.show', $student->id) }}" title="Show Information"
                                            class="text-primary fs-5">
                                            <i class='bx bx-show'></i>
                                        </a>
                                        <a href="{{ route('educations.index', ['id' => $student->id]) }}"
                                            title="Show Educational Background" class="text-secondary fs-5">
                                            <i class='bx bxs-graduation'></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="px-3 pt-3 float-end">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
