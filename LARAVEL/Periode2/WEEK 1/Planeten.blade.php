<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    @foreach ($planets as $planet)
        <h2>{{ $planet->name }}</h2>
        {{ $planet->description }}
    @endforeach
</div>
