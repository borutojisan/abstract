@extends('templates.master')
@section('content')
<style>
table,th,td,tr{
	font-size:12px;
}
</style>
<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered display datatable" id="example" style="max-width:100%;">
<thead>
    <tr>
        <th width="5%">Bil</th>
        <th width="30%">Tajuk</th>
        <th width="25%">Ketua</th>
        <th width="15%">Organisasi</th>
        <th width="15%"># rujukan</th>
        <th width="20%">Status Bayaran</th>
    </tr>
</thead>
<tbody>
<?php $bil=1;?>

@foreach ($data['abstrak'] as $abstract)
<?php






?>
            <tr>
                <td align="center" >{{$bil}}</td>
                <td align="left" ><a href="{{URL::to('anjung/penyelaras/abstrak/'.$abstract->abs_id)}}">{{$abstract->abs_tajuk}}</a></td>
                <td align="center">{{$abstract->abs_ketua}}</td>
                <td  class="">{{$abstract->abs_organisasi}}</td>
                 <td  class="">{{$abstract->abs_rujukan}}</td>
                <td >
               @if( $abstract->abs_proofpic!=null)
               <p class="text-success">sudah</p>
               @elseif( $abstract->abs_status==0)
               <p class="text-error">belum</p>
               @endif
            </td>
            </tr>
        <?php $bil++; ?>
        @endforeach
</tbody>
</table>
@stop

 <!--<a class="btn btn-info" href="https://docs.google.com/viewer?url=<?php echo url('uploads/abstrak/'.$abstract->abs_abstrakdoc); ?>" target="new">Abstrak</a>
                <a class="btn btn-info" href="<?php echo url('uploads/proof/'.$abstract->abs_proofpic); ?>" target="new">Bukti Pembayaran</a>
                <a class="btn btn-info" href="{{URL::to('anjung/abstrak/penyelaras/sah/'.$abstract->abs_id)}}" target="new" onClick="javascript:return confirm('pasti?')">Sahkan</a>-->