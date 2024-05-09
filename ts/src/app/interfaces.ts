export interface Topico {
  id: number;
  assunto: string;
  autorTopico: string;
  conteudo: string;
  isLiked: boolean;
  curtidas: number;
  aguardandoFeedback: boolean;
  dataCriacao: string;
  respostas: Resposta[] | undefined;
  isExpandido: boolean;
}

export interface Resposta {
  id: number;
  authorResponse: Autor | undefined;
  contentResponse: String;
  dataResposta: string;
}

export interface User {
  id: number;
  name: string;
  topicsAguardandoFeedback: number;
}

export interface Autor {
  id: number;
  name: string;
  instituicao: Universidade | undefined;
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
  instituicaoNumber: number;
}

export interface Trabalho {
  id: number;
  autor: Autor | undefined;
  coautores: Autor[] | undefined;
  tipoApresentacao: string;
  eixoTematico: string;
  palavrasChave: string;
}
