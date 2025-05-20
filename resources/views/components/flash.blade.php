@php

    $type ??= 'info';
    $value ??= '';

@endphp

<div class="alert alert-{{$type}}" role="alert">
    <strong>{{ $value }}</strong>
</div>



<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.add('fade');
            setTimeout(() => {
                alert.remove();
            }, 500);
        }
    }, 3000);
</script>

<style>
    .fade {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
</style>
