function brilho(corHex) {
    let vermelho = parseInt(corHex.substring(0, 1), 16);
    let verde = parseInt(corHex.substring(2, 3), 16);
    let azul = parseInt(corHex.substring(4, 5), 16);

    console.log(vermelho, verde, azul);

    let brilho = ((vermelho * 299) + (verde * 587) + (azul * 114))/1000
    console.log("Brilho: " + brilho);
}
