@extends(($is_teacher) ? 'teacher.dashboardTeacher' :'studiant.dashboardStudiant')

@section(($is_teacher) ? 'Teacher-content':'Student-content')
 @include('layouts.profile-card.settings')
 @include('layouts.profile-card.address')

@endsection

