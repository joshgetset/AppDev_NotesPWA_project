<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background-color: #7b7e87;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 30px;
        }

        .glass {
            width: 100%;
            max-width: 420px;
            margin: 16px;
            padding: 20px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px rgba(0, 0, 0, .2);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            color: #141313;
        }

        .header h6 {
            margin: 0;
            font-weight: 600;
        }

        .note-card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 14px;
            padding: 14px;
            margin-bottom: 12px;
            color: #070707;
        }

        .note-title {
            font-size: 0.95rem;
            font-weight: 600;
        }

        .note-content {
            font-size: 0.8rem;
            opacity: 0.85;
        }

        .fab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #fff;
            color: #764ba2;
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .3);
            text-decoration: none;
        }

        .empty-message {
            color: #fff;
            text-align: center;
            opacity: 0.8;
            margin-top: 20px;
        }

        .add-note-card {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 14px;
            padding: 14px;
            margin-bottom: 12px;
            color: #fff;
        }

        .add-note-card input,
        .add-note-card textarea {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #fff;
        }

        .add-note-card input::placeholder,
        .add-note-card textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>

<body>

    <div class="glass">

        @php $user = auth()->user(); @endphp
        <!-- Header -->
        <div class="header">
            <h6>
                @if((int) $user->role === 1)
                    {{ $user->name }} (admin)
                @else
                    Hello, {{ $user->name }}
                @endif
            </h6>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary">
                    Logout
                </button>
            </form>
        </div>

        @if((int) $user->role === 1)
            <h6>Hello, {{ $user->name }}, these are all the notes and their authors</h6>
        @endif

        <!-- Add Note -->
        <div class="add-note-card">
            <form method="POST" action="/notes">
                @csrf

                <div class="mb-2">
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control" 
                        placeholder="Title" 
                        required
                    >
                </div>

                <div class="mb-2">
                    <textarea 
                        name="content" 
                        class="form-control" 
                        rows="3" 
                        placeholder="Content" 
                        required
                    ></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Add Note
                </button>
            </form>
        </div>

        <!-- Notes List -->
        @if(isset($notes) && count($notes) > 0)
            @foreach($notes as $note)
                <div class="note-card">
                    <div class="note-title">
                        {{ $note->title }}
                    </div>

                    <div class="note-content">
                        {{ $note->content }}
                    </div>

                    @if(auth()->user()->role == 1)
                        <small class="text-dark">
                            <strong>Author:</strong> {{ $note->user->name }}
                        </small>
                    @endif

                    <form method="POST" action="/notes/{{ $note->id }}" class="mt-2">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger w-100">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <div class="empty-message">
                No notes yet. Add one above!
            </div>
        @endif

    </div>

</body>
</html>
