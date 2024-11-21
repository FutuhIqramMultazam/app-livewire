<div>
    @if (session('berhasil'))
<script>
  Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: "{{ session('berhasil') }}",
      iconColor:'green',
  });
</script>
@endif 

@if (session('gagal'))
<script>
  Swal.fire({
      icon: 'error',
      title: 'Gagal!',
      text: "{{ session('gagal') }}",
      iconColor:'red',
  });
</script>
  @endif 
</div>
