export interface IReply {
  id: number;
  content: string;
  author_name: string;
  role: Role;
}

export enum Role {
  AUTOR = 'Autor',
  COAUTOR = 'Coautor',
  LEITOR = 'Leitor',
}
