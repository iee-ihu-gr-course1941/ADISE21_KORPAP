let last_change;

async function get_status() {
    const response = await fetch('../db/Moutzouris.php/board/get-status');
    const data = await response.json();
    console.log(data);

    if (data.status.status == 'aborded') {
        alert('Το παιχνίδι διακόπηκε');
        window.location.href = '/~it154586/ADISE21_KORPAP/authentication/logout.php';
    } else

    if (data.status.status == 'not active') {
        alert('Δεν υπάρχει ενεργό παιχνίδι');
    } else

    if (data.status.status == 'initialized') {
        alert('Αρχικοποιήθηκε')
    } else

    if (data.status.status == 'ended') {
        alert('Τελος Παιχνιδιού');
    }

    //Cards state
    if (data.status.last_change != last_change) {
        last_change = data.status.last_change;

        document.getElementById('mine-cards').innerHTML = '';
        document.getElementById('opponent-cards').innerHTML = '';

        const {
            my_id
        } = data;

        for (playerId in data.player_cards) {
            if (playerId == my_id) {
                data.player_cards[my_id].forEach(card => {
                    create_card(card, 'mine-cards', my_id, undefined);
                })
            } else {
                data.player_cards[playerId].forEach(card => {
                    create_card(card, 'opponent-cards', my_id, playerId);
                })
            }
        }
    }

}

async function remove_card(playerId, card1, card2) {
    const response = await fetch('../db/Moutzouris.php/board/remove_card/' + playerId + '/' + card1 + '/' + card2);
    const data = await response.json();
    console.log(data);

}

async function take_card(card, my_id, opponent_id) {
    const response = await fetch('../db/Moutzouris.php/board/take_card/' + card.id + '/' + my_id + '/' + opponent_id);
    const data = await response.json();
    console.log(data);
}

function create_card(card, player, my_id, opponent_id) {
    const create_card = document.createElement('div');
    create_card.classList.add('card');
    // create_card.innerText = `${card.number} - ${card.symbol}`;
    const img = document.createElement('img');
    if (player == 'opponent-cards') {
        img.src = 'https://i.ibb.co/ZVBc4JF/Seek-Png-com-card-back-png-3492279.png';
        img.addEventListener("click", take_card.bind(null, card, my_id, opponent_id));
    } else {
        img.src = card.image;
        img.addEventListener("click", click_counter.bind(null, card, my_id));
    }
    create_card.appendChild(img);
    document.getElementById(player).appendChild(create_card);
}

let card_counter = [];
//Check cards that have been clicked
function click_counter(card, my_id) {
    card_counter.push(card);
    
    if(card_counter.length == 2) {
        if (card_counter[0].number == card_counter[1].number && card_counter[0].id != card_counter[1].id) {
            remove_card(my_id, card_counter[0].id, card_counter[1].id);
            card_counter = [];
        } else {
            card_counter = [];
        }
    }
}

setInterval(get_status, 3000);

var timeInSecs;
var ticker;

function startTimer(secs) {
    timeInSecs = parseInt(secs);
    ticker = setInterval("tick()", 1000);
}

function tick() {
    var secs = timeInSecs;
    if (secs > 0) {
        timeInSecs--;
    } else {
        clearInterval(ticker);
        startTimer(10);
    }
    secs %= 60;
    var timer = (((secs < 10) ? "0" : "")) + secs;

    document.getElementById("countdown").innerHTML = timer;
}

startTimer(10);