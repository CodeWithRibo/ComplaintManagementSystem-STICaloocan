<x-Layout>
    <x-admin.navigation-bar>
        <x-Section>
            <x-admin.profile-layout route="{{route('admin.user-profile' , $user->id)}}">

                <x-admin.input-layout label="First Name" name="first_name" placeholder="e.g., Juan " value="{{$user->first_name}}"/>
                <x-admin.input-layout label="Last Name" name="last_name" placeholder="e.g., Dela Cruz " value="{{$user->last_name}}"/>
                <x-admin.input-layout label="Student ID" name="student_id_number" placeholder="e.g., 02000411496" value="{{$user->student_id_number}}"/>
                <x-admin.input-layout label="Email" name="email" placeholder="e.g., juandelacruz@gmail.com" value="{{$user->email}}"/>

                <x-admin.input-layout label="Section" name="section" placeholder="e.g., BT-207" value="{{$user->section}}"/>
                <x-admin.input-layout label="Contact Number" name="contact_number" placeholder="e.g., 09933404418" value="{{$user->contact_number}}"/>

                <x-admin.select-layout label="Program" name="program" disabledOption="Select Program">
                    <option value="BS IN INFORMATION TECHNOLOGY" {{ $user->program === 'BS IN INFORMATION TECHNOLOGY' ? 'selected' : '' }}>BS IN INFORMATION TECHNOLOGY</option>
                    <option value="BS IN BUSINESS ACCOUNTANCY"  {{ $user->program === 'BS IN BUSINESS ACCOUNTANCY' ? 'selected' : '' }}>BS IN BUSINESS ACCOUNTANCY</option>
                    <option value="BS IN HOSPITALITY MANAGEMENT" {{ $user->program === 'BS IN HOSPITALITY MANAGEMENT' ? 'selected' : '' }}>BS IN HOSPITALITY MANAGEMENT</option>
                    <option value="BS IN TOURISM MANAGEMENT" {{ $user->program === 'BS IN TOURISM MANAGEMENT' ? 'selected' : '' }}>BS IN TOURISM MANAGEMENT</option>
                </x-admin.select-layout>

                <x-admin.select-layout label="Grade Level" name="grade_level" disabledOption="Select Program">
                    <option value="1st Year" {{$user->grade_level === '1st Year' ? 'selected' : ''}}>1st Year</option>
                    <option value="2nd Year" {{$user->grade_level === '2nd Year' ? 'selected' : ''}}>2nd Year</option>
                    <option value="3rd Year" {{$user->grade_level === '3rd Year' ? 'selected' : ''}}>3rd Year</option>
                    <option value="4th Year" {{$user->grade_level === '4th Year' ? 'selected' : ''}}>4th Year</option>
                </x-admin.select-layout>

            </x-admin.profile-layout>
        </x-Section>
    </x-admin.navigation-bar>
</x-Layout>
