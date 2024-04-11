export class Detalhes {
    tipoApresentacao: string;
    eixoTematico: string;
    palavrasChave: string[];
  
    constructor(tipoApresentacao: string, eixoTematico: string, palavrasChave: string[]) {
      this.tipoApresentacao = tipoApresentacao;
      this.eixoTematico = eixoTematico;
      this.palavrasChave = palavrasChave;
    }
  }