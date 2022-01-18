<!-- @if(Session::has('success'))
<script>
swal({
title: "{{Session::get('success')}}",
text: "هذه الرساله سوف تختفي بعد 2 ثانية",
timer: 2000,
showConfirmButton: false
});
</script>
@endif -->

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
