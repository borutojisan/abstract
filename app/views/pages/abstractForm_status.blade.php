<?php

  
  
?> 
 
 <table class="table" width="70%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Status Abstrak</strong></td>
    <td>{{isset($abstrak)&&$abstrak->abs_abstrakdoc!=null? '<p class="text-success">Abstrak sudah dimuatnaik</p>':'<p class="text-error">Abstrak belum di muat naik</p>'}}</td>
  </tr>
  <tr>
    <td><strong>Status Bukti Pembayaran</strong></td>
    <td>{{isset($abstrak)&&$abstrak->abs_proofpic!=null? '<p class="text-success">Bukti pembayaran sudah dimuatnaik</p>':'<p class="text-error">Bukti pembayaran belum di muat naik</p>'}}</td>
  </tr>
  <tr>
    <td><strong>No rujukan</strong></td>
    <td>{{isset($abstrak)&&$abstrak->abs_rujukan!=null? '<p class="text-success">No rujukan sudah berikan</p>':'<p class="text-error">No rujukan belum berikan</p>'}}</td>
  </tr>
</table>