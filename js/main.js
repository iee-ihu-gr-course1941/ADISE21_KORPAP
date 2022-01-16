async function start_game() {

    const check_players = document.getElementById('check-players');
    const response = await fetch('./db/Moutzouris.php/get-players');
    const data = await response.json();
    console.log(data);

    if (data.length > 1) {
        fetch('./db/Moutzouris.php/game-start').then(res => res.json()).then(data => {
            if (data.status == 200) {
                window.location.href = './view/board.php';
            }
        })
    } else {
        check_players.innerText = 'Χρειάζεται ακόμα 1 άτομο για να ξεκινήσει το παιχνίδι';
        return;
    }
}

setInterval(async () => {
    const response = await fetch('./db/Moutzouris.php/board/get-status');
    const data = await response.json();
    console.log(data);
    if (data.status.status == 'started') {
        window.location.href = './view/board.php';
    }
}, 2000)