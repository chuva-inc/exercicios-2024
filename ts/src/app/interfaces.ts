export interface Topico {
  id: number;
  assunto: string;
  autorTopico: string;
  conteudo: string;
  isLiked: boolean;
  curtidas: number;
  respostas: number;
  aguardandoFeedback: boolean;
  dataCriacao: string;
}

export interface User {
  id: number;
  name: string;
  topicsAguardandoFeedback: number;
}

export interface Autor {
  id: number;
  name: string;
  number: number;
}

export interface DetalhesTrabalho {
  id: number;
  label: string;
  response: string;
}

export interface VideoData {
  titleVideo: string;
  authorName: string;
  authorLocalization: string;
}

export interface HeaderData {
  firstTitleHeader: string;
  titleHeader: string;
}

export interface SideMenuOptions {
  id: number;
  label: string;
}

export interface Language {
  id: number;
  label: string;
}

export interface Universidade {
  id: number;
  universidadeName: string;
  universidadeNumber: number;
}
