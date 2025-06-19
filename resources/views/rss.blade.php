<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
    <channel>
        <title>Website Resmi Desa Karangpucung</title>
        <link>{{ url('/') }}</link>
        <description>RSS feed for my blog</description>

        @foreach ($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ url('berita/' . $post->slug) }}</link>
            <description>{{ Str::limit($post->context, 150) }}</description>
            <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            <guid>{{ url('berita/' . $post->slug) }}</guid>
        </item>
        @endforeach
    </channel>
</rss>