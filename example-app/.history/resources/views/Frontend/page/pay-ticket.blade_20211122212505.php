<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay tickets</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</head>
<style>
    as {
        background-repeat: no-repeat;
        background-size: 100%
    }

</style>

<body>
    <div class="container">
        <h1 style=" background-size: 100%;  background-image: url('{{ asset("$URL_IMG_FILM/" . $show_time->film->avatar) }}') ;  background-repeat: no-repeat;"
            class="title   text-center p-4">{{ $show_time->film->name }}</h1>
        <div class="row">
            <div class="col-sm-6">
                                @if (session()->has('chair'))
                                @foreach (session()->get('chair') as $value)
                                    <p>Ghế <?php if ($value['status'] == 1) {
                    echo 'VIP';
                } else {
                    echo 'thường';
                } ?> : <?= $value['chair'] ?></p>
                                @endforeach
                            @endif
                            <?php
                            $prFoods = 0;
                            $prTicket = 0 ;
                            if(session()->has('book1')){
                                foreach(session()->get('book1') as $key => $value){
                                    if($key == 'ticket'){
                                        foreach($value as $k => $v){
                                            $ticket = \App\Models\Ticket::where('id_price_ticket',$k)->first();
                                            $prTicket += $ticket->unit_price * $v;
                                            ?>
                            <p> <?php echo $ticket->name; ?>
                                <span class="badge rounded-pill bg-info text-dark"> <?= $v ?> </span>
                                <span class="badge rounded-pill bg-info text-dark"> <?= $ticket->unit_price ?> </span>
                                🔗 <?php echo $ticket->unit_price * $v; ?>
                            </p>
                            <?php
                                        }
                                    }
                                };
                                foreach(session()->get('book1') as $key => $value){
                                    if($key == 'food'){

                                        foreach($value as  $k => $v){
                                                $food = \App\Models\Foods::where('id_food',$k)->first();
                                                $prFoods += $food->price * $v;
                                                ?>
                            <p> <?php echo $food->name; ?>
                                <span class="badge rounded-pill bg-info text-dark"> <?= $v ?> </span>
                                <span class="badge rounded-pill bg-info text-dark"> <?= $food->price ?> </span>
                                🔗 <?php echo $food->price * $v; ?>
                            </p>
                            <?php
                                            }
                                    }
                                }

                            }else{
                                ?>
                            Hóa đơn ...
                            <?php
                            }
                            ?>
                            <h2>Tổng : <?= number_format($prFoods + $prTicket) ?> VND</h2>
            </div>

            <div class="col-sm-6">
                <p>{{ $show_time -> cinema_room->cinema ->cluster_cinema-> name }}-{{ $show_time -> cinema_room->cinema -> name }}</p>
            </div>

        </div>
    </div>

</body>

</html>
