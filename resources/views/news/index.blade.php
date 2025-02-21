@extends('layouts.app')

@section('content')
<div class="container">
    <div id="news-container">
        @include('news.partials.news_list')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();

        let page = $(this).attr('href').split('page=')[1];

        $.ajax({
            url: "?page=" + page,
            success: function(data) {
                $('#news-container').html(data);
                $('html, body').animate({ scrollTop: $("#news-container").offset().top }, 500);
            }
        });
    });
});
</script>
@endsection
