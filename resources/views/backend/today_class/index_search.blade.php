
<div class="table-box">
    <table class="basic-table booking-table">
        <thead>
            <tr>
                <th>Video Title</th>
                <th>Course</th>
                <th>Gender</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $todayClass)
                <tr>
                    <td>{!! $todayClass->video_title !!}</td>
                    <td>
                        @foreach ($todayClass['course'] as $crs)
                            <li>{{ $crs }} </li>
                        @endforeach
                    </td>
                    <td>{!! $todayClass->gender !!}</td>
                    <td>{!! $todayClass->order !!}</td>
                    <td><span class="{{ $todayClass->is_active == 1 ? 'paid' : 'cancel' }} t-box">{!! $todayClass->is_active == 1 ? 'Publish' : 'Unpublish' !!}</span></td>
                    <td>
                    <a href="{{ route('admin.todayclass.edit', $todayClass->id) }}" class="button gray" data-toggle="tooltip" data-placement="top" title="Update"><i class="sl sl-icon-pencil"></i></a>
                    <a href="{{ route('admin.todayclass.delete', $todayClass->id) }}" class="button gray" onclick="return confirm('Are you sure to Delete?')"><i class="sl sl-icon-close" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
