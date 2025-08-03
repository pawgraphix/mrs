<table>
    <thead>
    <tr>
        <th colspan="8">MAINTENANCE REPORT AS AT {{date('d M Y H:i')}}</th>
    </tr>
    <tr>
        <th>S/N</th>
        <th>Reporter Name</th>
        <th>Asset Name</th>
        <th>Location</th>
        <th>Issue</th>
        <th>Status</th>
        <th>Reported Time</th>
        <th>Resolved Time</th>
    </tr>
    </thead>

    <tbody>
    @foreach($items as $key=>$item)
        <tr>
            <td style="width: 5%">{{++$key}}</td>
            <td>{{$item->user->full_name}}</td>
            <td>{{$item->asset->name}}</td>
            <td>{{$item->location->name}}</td>
            <td>{{$item->issue}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->reported_at}}</td>
            @if($item->resolved_at)
                <td>{{$item->resolved_at}}</td>
            @else
                <td>Not yet Resolved</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
