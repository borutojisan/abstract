@extends('templates.master')
@section('content')
<h4>Senarai Peserta</h4>
<table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered display datatable" id="example" style="max-width:100%;">
<thead>
    <tr>
        <th width="5%">Bil</th>
        <th width="35%">Nama</th>
        <th width="25%">Email</th>
        <th width="15%">Organisasi</th>
        <th width="20%">Katakunci</th>
    </tr>
</thead>
<tbody>
<?php $bil=1;?>


 
@foreach ($data['usr'] as $usr)
<?php


$organisasi=Abstrak::where('abs_usrid','=',$usr->usr_id)->first();



?>
            <tr>
                <td align="center" >{{$bil}}</td>
                <td align="left" >{{$usr->usr_name}}</td>
                <td align="center">{{$usr->usr_email}}</td>
                <td  class="">{{$organisasi->abs_organisasi}}</td>
                <td >{{$usr->usr_pass2}}
            </td>
            </tr>
        <?php $bil++; ?>
        @endforeach
</tbody>
</table>
@stop

 