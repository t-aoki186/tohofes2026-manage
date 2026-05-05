<x-manage-layout>
    <section class="pt-25 w-full mx-auto">
        <div class="min-w-full flex flex-wrap gap-5 justify-center py-5">
            <div class="clock-setting-btn-item">
                <a href="{{ route('manage.inquiry') }}" class="dash-link cursor-pointer">
                    <i class="fa-solid fa-envelope"></i>お問い合わせ確認
                </a>
            </div>
            <div class="clock-setting-btn-item">
                <a href="{{ route('manage.post.organization.index') }}" class="dash-link cursor-pointer">
                    <i class="fa-solid fa-circle-plus"></i>参加団体投稿
                </a>
            </div>
            <div class="clock-setting-btn-item">
                <a href="{{ route('manage.post.blog.index') }}" class="dash-link cursor-pointer">
                    <i class="fa-solid fa-circle-plus"></i>ブログ投稿
                </a>
            </div>
            <div class="clock-setting-btn-item">
                <a href="{{ route('manage.post.news.index') }}" class="dash-link cursor-pointer">
                    <i class="fa-solid fa-circle-plus"></i>お知らせ投稿
                </a>
            </div>
        </div>
    </section>
</x-manage-layout>