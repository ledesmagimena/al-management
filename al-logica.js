const arrayCuentas = [
  {
    nroCuenta: 5486273622,
    tipoDeCuenta: "Cuenta Corriente",
    saldoEnPesos: 27771,
    titularCuenta: "Abigael Natte",
  },
  {
    nroCuenta: 1183971869,
    tipoDeCuenta: "Caja de Ahorro",
    saldoEnPesos: 8675,
    titularCuenta: "Ramon Connell",
  },
  {
    nroCuenta: 9582019689,
    tipoDeCuenta: "Caja de Ahorro",
    saldoEnPesos: 27363,
    titularCuenta: "Jarret Lafuente",
  },
  {
    nroCuenta: 1761924656,
    tipoDeCuenta: "Cuenta Corriente",
    saldoEnPesos: 32415,
    titularCuenta: "Ansel Ardley",
  },
  {
    nroCuenta: 7401971607,
    tipoDeCuenta: "Cuenta Unica",
    saldoEnPesos: 18789,
    titularCuenta: "Jacki Shurmer",
  },
];

function filterByProperty(property, valor) {
  const accountFilters = arrayCuentas.filter(
    (cuenta) => cuenta[property] === valor
  );
  if (accountFilters.length === 0) {
    console.log("No se encontraron cuentas con ese campo.");
  }
  return accountFilters;
}


const debitAccount = (nroCuenta, amount) => {
  const cuenta = arrayCuentas.find((cuenta) => cuenta.nroCuenta === nroCuenta);
  if (!cuenta) {
    console.log(`Error: La cuenta  no fue encontrada.`);
    return;
  }

  if (cuenta.saldoEnPesos < amount) {
    console.log(`Error: Fondos insuficientes en la cuenta ${nroCuenta}.`);
    return;
  }

  cuenta.saldoEnPesos -= amount;
  console.log(
    `Débito de ${amount} pesos realizado. Nuevo saldo: ${cuenta.saldoEnPesos} pesos.`
  );
};

console.log(filterByProperty("nroCuenta", 7401971607675675));
console.log(filterByProperty("titularCuenta", "Jacki Shurmer"));
console.log(filterByProperty("tipoDeCuenta", "Cuenta Unica"));
debitAccount(7401971607, 2000);