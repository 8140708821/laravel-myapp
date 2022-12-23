<div>
    <style>
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }

        .input-container {
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }

        .icon {
            padding: 2px;
            background: dodgerblue;
            color: white;
            min-width: 50px;
            text-align: center;
            width: 10px;
        }

        /* Style the input fields */
        .input-field {
            width: 100%;
            padding: 10px;
            outline: none;
        }

        .icon:hover {
            padding: 5px;
        }

        .chat-div {
            height: 400px;
            overflow: scroll;
        }
    </style>
    <h2>Chat Messages</h2>
    <div class="chat-div" id="your_div">
        @foreach ($messageData as $data)
            @if ($data['is_sender'] == $senderId)
                <div class="container sender">
                    <img src="https://www.w3schools.com/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
                    <p>{{ $data['message'] }}</p>
                    <span class="time-right">11:00</span>
                </div>
            @else
                <div class="container darker">
                    <img src="https://www.w3schools.com/w3images/avatar_g2.jpg" alt="Avatar" class="right"
                        style="width:100%;">
                    <p>{{ $data['message'] }}</p>
                    <span class="time-left">11:01</span>
                </div>
            @endif
        @endforeach
    </div>
    <div wire:loading wire:target="sendMessage">
        Meessage Sending...
    </div>
    <div class="input-container">
        <input type="text" name="newMessage" wire:model.defer="newMessage" onkeydown="myFunction(this)" />
        <img src="{{ url('img/send.jpg') }}" id="sendMsg" wire:click="sendMessage" class="fa fa-key icon"></img>
    </div>
    <div wire:poll.2000ms="isNewMessage">
    </div>
    <div wire:offline>
        You are now offline.
    </div>
</div>
<script>
    function myFunction(e) {
        if (event.keyCode == 13) {
            document.getElementById("sendMsg").click();
        }
    }
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.sent', (el, component) => {
            var objDiv = document.getElementById("your_div");
            objDiv.scrollTop = objDiv.scrollHeight;
        })
    });
</script>
