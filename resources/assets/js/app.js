require('./bootstrap');

var userid = $("#userid").val();
var username = $("#username").val();

// pokeSubmit submits a poke to the server, which submits it to the Pokees chan.
// Pokee is the ID of the user that is being poked.
function pokeSubmit(pokee) {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
   url: '/poke',
   type: 'POST',
   data: {pokee: pokee},
   error: function(data)
   {
     console.log("Something caught fire, probably server related!");
   }
 });
}

// Listener to submit a poke and update the UI when the user clicks the Poke btn
$("#pokebutton").on("click",function(){
  var toPoke = $("#pokee").val();
  var pokeeName = $("#pokee option:selected").text();
  pokeSubmit(toPoke);
  pokify(username,pokeeName)
})

// Laravel Echo Gotcha:You need to preface events with a period for some reason.
/* This is the listener that makes use of Laravel Echo to listen to the correct
/  channel for the user.*/
Echo.channel('user.'+userid)
.listen('.poke', (e) => {
        console.log("Pusher sent something");
        console.log(e);
        //increase poke count by one
        incrementPokes(".pokesRecvd");
        //add notification
        pokify(e.poker,e.pokee);
    });

/* This function accepts a string that references the class or ID to have
/  its innards incremented by one. It also increments the total by one. */
function incrementPokes(counter){
  var toIncrement = $(counter).html().trim();
  var totalP = $(".pokeTotal").html().trim();
  $(counter).html(parseInt(toIncrement)+1);
  $(".pokeTotal").html(parseInt(totalP)+1);
}

// This function adds a notification to the users browser concerning a poke.
// Poker is the person doing the poking, and Pokee is the person recieving.
function pokify(poker,pokee) {
  var pokification = "<div class='pokeification'>"+poker+">>"+pokee+"</div>";
  $(".poketivity").prependhto(pokification);
}
