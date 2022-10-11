<div class="sidebar">
    <h3>すべてのメモ</h3>
    <ul>
        @foreach ($memos as $memo)
            <li>
                <a href="{{ route('memo.show', $memo->id) }}">{{ $memo->title }}</a>
            </li>
        @endforeach
    </ul>

    <h3>未解決</h3>
    <ul>
        @foreach ($unsolved_memos as $memo)
            <li>
                <a href="{{ route('memo.show', $memo->id) }}">{{ $memo->title }}</a>
            </li>
        @endforeach
    </ul>

    <h3>解決済</h3>
    <ul>
        @foreach ($solved_memos as $memo)
            <li>
                <a href="{{ route('memo.show', $memo->id) }}">{{ $memo->title }}</a>
            </li>
        @endforeach
    </ul>

    <h3>公開</h3>
    <ul>
        @foreach ($publish_memos as $memo)
            <li>
                <a href="{{ route('memo.show', $memo->id) }}">{{ $memo->title }}</a>
            </li>
        @endforeach
    </ul>

    <h3>フォルダ</h3>
    <ul>
        <li>
            <a href="" class="">未分類</a>
        </li>
        @foreach ($folders as $folder)
            <li>
                {{ $folder->name }}
                <ul>
                    @foreach ($folder->memos as $memo)
                        <li>
                            <a href="{{ route('memo.show', $memo->id) }}">{{ $memo->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <form action="{{ route('folder.delete', $folder->id) }}" method="post">
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
    
    <form action="{{ route('folder.store') }}" method="post">
        @csrf

        <input type="text" class="@error('email') p-form__input--error @enderror" name="folder" value="{{ old('folder') }}" placeholder="フォルダ" >
        @include('components.form-error-msg', ['name' => 'folder'])

        <button type="submit" class="c-submit-btn">追加</button>
    </form>
</div>