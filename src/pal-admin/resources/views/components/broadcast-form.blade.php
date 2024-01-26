<div>
    Broadcast用

    <input type="text"
           class="broadcast-text">
    <button class="broadcast-button">送信</button>
</div>

<script>
    //送信ボタンを押したらブロードキャストテキストをＡＰＩを投げて送信
    const broadcastButton = document.querySelector('.broadcast-button');
    broadcastButton.addEventListener('click', () => {
        //APIを投げる前に確認させる
        if (!confirm('ブロードキャストを送信しますか？')) {
            return;
        }

        const broadcastText = document.querySelector('.broadcast-text').value;

        fetch('/api/broadcast', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                broadcast_text: broadcastText
            })
        })
            .then(response => response.json())
            .then(data => {
                alert("ブロードキャストを送信しました。");
            })
            .catch(error => {
                console.log(error);
                alert(error.message);
            });
    });


</script>
