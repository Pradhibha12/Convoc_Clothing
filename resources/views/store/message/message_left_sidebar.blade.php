@php
    $user_id = auth()->user()->id;
    if (isset($search) && $search != '') {
        $my_threads = App\Models\Message_thread::where(function ($query) use ($user_id) {
            $query->where('user_one', $user_id)->orWhere('user_two', $user_id);
        })
        ->where(function ($query) use ($search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")->orWhere('email', 'like', "%$search%");
            });
        })
        ->orderBy('updated_at', 'desc')
        ->get();
    } else {
        $my_threads = App\Models\Message_thread::where('user_one', $user_id)->orWhere('user_two', $user_id)->orderBy('updated_at', 'desc')->get();
    }
    
@endphp
@foreach ($my_threads as $thread)
    @php
        $latest_message = $thread->messages()->orderBy('id', 'desc')->firstOrNew();
        $number_of_unread_message = $thread->messages()->where('read_status', '!=', 1)->count();
    @endphp
    <li>
        <a href="{{ route('vendor.messages', ['thread_id' => $thread->id]) }}" class="message-sidebar-message @if ($thread_details->id == $thread->id) active @endif">
            <div class="user">
                <img src="{{ get_image($thread->user->photo) }}" alt="">
            </div>
            <div class="details d-flex justify-content-between">
                <div class="name-message">
                    <h6 class="name">{{ $thread->user->name }}</h6>
                    <p class="message ellipsis-line-2">{{ ellipsis($latest_message->message, 160) }}</p>
                </div>
                @if ($latest_message->created_at)
                    <div class="time text-end">
                        @if ($number_of_unread_message > 0)
                            <span class="badge bg-danger">{{ $number_of_unread_message }}</span>
                        @endif
                        <p class="mt-2">{{ date_formatter($latest_message->created_at, 2) }}</p>
                    </div>
                @endif
            </div>
        </a>
    <li>
@endforeach
