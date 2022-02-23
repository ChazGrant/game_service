@extends('layout')
@section('title', "Minesweeper")
<head>
    <style type="text/css">
        table,tr {
            background: #C4C4C4;
            border: 1px solid #808080;
            border-collapse: collapse;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
        }

        td {
            border: 1px solid #808080;
            padding: 0.5px;
            width:16px;
            height:16px;
        }

        .i1 {
            color: #0000ff;
        }

        .i2 {
            color: #1D751F;
        }

        .i3 {
            color: #ff0000;
        }

        .i4 {
            color: #0D0485;
        }

        .i5 {
            color: #520E0F;
        }

        .i6 {
            color: #0F877E;
        }
    </style>
</head>
@section('main_content')
    <pre>
        <table>
            @for ($y = 1; $y < $fy; $y++)
                <td>
                @for ($x = 1; $x < $fx; $x++)
                    <td>
                        {{ $mCounter = 0 }}
                        @if ($minefield[$x][$y] == 'X')
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABUElEQVR42pWSS26CUBRAH6ho0jqijBpHdkhIjCtgDXbGzI7ZBVOURPegMagYmZAwFZdh0iWwgfb0vYZQYNKbYO7n3J/vivP5nCTJ4XA4Ho+JFJSVlLoHAAVYXC4X7DzP0zRF2e12RVG8SkHBxEkIQOULUjF8399ut1mW3W63IAiepKBg4iQEABbHseC7Xq+bzcZ13fV6PZ/Px+OxrutCiNFoNJvNcBICADudTkKNSJkoikBFS3ASAvgdiY9Bae04DuHp29TzvMX7QjXp9/v82rYNAPaTQN79fmdcy7KILT+WX1IMw1Ader2eaZoAYMAiDMPJZKIqIdQuy/Lx+RgMBvXBAMD2+/2fBE3TmGQ4HFblOxKqkehL9/bSzZGqpdms2rJeuLn0v//WxsPxUryXQrsfrvM0nqV0n0b7+FjuRQpKx/Gp88agXf2Y6wdPSOnA3/AoQ71G5naTAAAAAElFTkSuQmCC" />
                            </td>
                            @continue
                        @endif
                    @if ($minefield[$x - 1][$y - 1] === 'X')
                        {{$mCounter++}}
                    @endif

                    @if ($minefield[$x][$y - 1] === 'X')
                        {{$mCounter++}}
                    @endif

                    @if ($minefield[$x + 1][$y - 1] === 'X')
                    {{$mCounter++}}
                    @endif

                    @if ($minefield[$x - 1][$y] === 'X')
                    {{$mCounter++}}
                    @endif

                    @if ($minefield[$x + 1][$y] === 'X')
                    {{$mCounter++}}
                    @endif

                    @if ($minefield[$x - 1][$y + 1] === 'X')
                        {{$mCounter++}}
                    @endif

                    @if ($minefield[$x][$y + 1] === 'X')
                        {{$mCounter++}}
                    @endif

                    @if ($minefield[$x + 1][$y + 1] === 'X')
                        {{$mCounter++}}
                    @endif

                    {{$minefield[$x][$y] = ($mCounter == 0) ? '&nbsp;&nbsp;' : $mCounter}}

                    <span class="i {{$mCounter}}"> {{$minefield[$x][$y]}} </span>
                    </td>
                @endfor
            </tr>
            @endfor
        </table>
    </pre>
@endsection
