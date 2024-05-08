import { Component } from '@angular/core';
import {
  faGlobe,
  faDownload,
  faStar,
  faPlus,
  faEllipsisV,
  faHeart,
  faCheckDouble,
} from '@fortawesome/free-solid-svg-icons';
import {
  faStar as faStarRegular,
  faHeart as faHeartRegular,
} from '@fortawesome/free-regular-svg-icons';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  faGlobe: any = faGlobe;
  faDownload: any = faDownload;
  faStar: any = faStar;
  faStarRegular: any = faStarRegular;
  faPlus: any = faPlus;
  faEllipsisV: any = faEllipsisV;
  faHeart: any = faHeart;
  faHeartRegular: any = faHeartRegular;
  faCheckDouble: any = faCheckDouble;
  titleSideMenu: string = 'SLACA 2019';
  optionsSideMenu: { id: number; label: string }[] = [
    { id: 1, label: 'Apresentação' },
    { id: 2, label: 'Comitês' },
    { id: 3, label: 'Autores' },
    { id: 4, label: 'Eixos temáticos' },
    { id: 5, label: 'Trabalhos' },
    { id: 6, label: 'Contato' },
  ];
  headerData: { firstTitleHeader: string; titleHeader: string } = {
    firstTitleHeader:
      'Anais do Simpósio Latino Americano de Ciências de Alimentos',
    titleHeader:
      'Anais do 13º Simpósio Latino Americano de Ciência de Alimentos',
  };
  issn: string = '2526-4806';
  languages: { id: number; label: string }[] = [
    { id: 1, label: 'PT, BR' },
    { id: 2, label: 'EN, US' },
    { id: 3, label: 'ES, ES' },
  ];
  emailUser: string = 'alguem12@galoascience.com';
  notificationNoRead: number = 0;
  selectedItemMenu: number = 0;
  selectedLanguages: number = 1;
  titlePage: string =
    'Análise sensorial de preparações funcionais desenvolvidas para escolares entre 09 e 15 anos, do município de Campinas/SP ';
  videoData: {
    titleVideo: string;
    authorName: string;
    authorLocalization: string;
  } = {
    titleVideo:
      'Análise sensorial de preparações funcionais desenvolvidas para escolares entre 09 e 15 anos, do município de Campinas/SP ',
    authorName: 'Beatriz Christiane Melo',
    authorLocalization: 'FCA / Universidade Estadual de Campinas',
  };
  citacaoFavorita: boolean = true;
  detalhesTrabalho: { id: number; label: string; response: string }[] = [
    {
      id: 1,
      label: 'Tipo de Apresentação',
      response: 'Pôster',
    },
    {
      id: 2,
      label: 'Eixo Temático',
      response: 'Alimentação e saúde (AS)',
    },
    {
      id: 3,
      label: 'Palavras Chaves',
      response: 'Alimentos funcionais, alimentação escolar',
    },
  ];
  autores: { id: number; name: string; number: number }[] = [
    {
      id: 1,
      name: 'Galileo Galilei',
      number: 1,
    },
    {
      id: 2,
      name: 'Berta Lange de Morretes',
      number: 2,
    },
    {
      id: 3,
      name: 'Isaac Newton',
      number: 3,
    },
    {
      id: 4,
      name: 'Cesar Lattes',
      number: 1,
    },
    {
      id: 5,
      name: 'Stephen Hawking',
      number: 4,
    },
  ];
  textoResumoArray: string[] = [];
  textoResumo: string =
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae turpis auctor, mollis felis ut, commodo turpis. Phasellus felis mauris, egestas eget cursus et, iaculis quis lacus. Fusce auctor eros sed magna ultricies gravida. Etiam aliquam dictum nisl, vel aliquet enim accumsan sit amet. Donec finibus nisi tellus, ut viverra lorem vestibulum ut. Phasellus condimentum orci id leo condimentum lobortis et non lorem. Sed id nisl metus. Quisque sollicitudin ligula in sapien scelerisque, ac gravida eros vestibulum. \n' +
    'Fusce vitae luctus dui. Donec id euismod mauris, in volutpat urna. Proin dapibus consequat feugiat. Proin dictum justo arcu, quis vestibulum augue lacinia quis. Sed dignissim dui nulla, ut faucibus mauris sodales id. Aliquam erat volutpat. Maecenas dolor enim, tincidunt id elit non, suscipit interdum turpis. Etiam finibus urna libero, eget interdum eros volutpat ullamcorper. Pellentesque et pretium lorem. Aenean interdum quis diam ac porttitor. Cras nec ipsum pulvinar, pharetra libero non, ornare enim. Etiam in laoreet odio. \n' +
    'Nam eget tristique elit, at fermentum tellus. Mauris scelerisque ligula id eleifend feugiat. Donec eleifend vehicula sem nec dapibus. Integer scelerisque neque dui, in lacinia erat molestie eu. Phasellus maximus dui eget lacus porta tempor. Ut ex nibh, dignissim quis purus semper, efficitur facilisis turpis. Praesent blandit elementum ultricies. Aliquam sit amet enim sit amet nulla pulvinar lobortis consectetur non odio. Phasellus at lacus hendrerit, vulputate nisi sit amet, viverra mauris. Etiam eu scelerisque orci. Quisque sagittis, mi vitae pharetra iaculis, orci elit eleifend massa, eu posuere mauris odio id odio. Morbi eu libero luctus, consectetur lorem vel, interdum sapien. Aenean in porta arcu. Maecenas eu maximus massa. \n' +
    'Praesent velit dolor, dignissim sed quam ac, efficitur porta justo. Pellentesque porta pharetra felis ut hendrerit. Nulla facilisi. Aliquam erat volutpat. Nunc sit amet faucibus quam. Maecenas dapibus luctus dolor at viverra. Duis nec fringilla libero. Duis risus nibh, viverra ac orci nec, iaculis dictum sem. Aliquam at malesuada arcu. Aliquam erat volutpat. Donec varius ipsum purus, ut vehicula purus placerat vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ';
  textoResumoFormatado: string = '';
  numParagrafosMostrados: number = 1;
  MAXRESUMOFIELD: number = 922;
  universidades: {
    id: number;
    universidadeName: string;
    universidadeNumber: number;
  }[] = [
    {
      id: 1,
      universidadeName: 'Universidade Estadual de Campinas',
      universidadeNumber: 1,
    },
    {
      id: 2,
      universidadeName: 'Universidade de São Paulo',
      universidadeNumber: 2,
    },
    {
      id: 3,
      universidadeName: 'Instituto Nacional de Pesquisas Espaciais',
      universidadeNumber: 3,
    },
    {
      id: 4,
      universidadeName: 'Universidade Federal do Rio de Janeiro',
      universidadeNumber: 4,
    },
  ];
  discussoesTopicos: {
    id: number;
    assunto: string;
    autorTopico: string;
    conteudo: string;
    isLiked: boolean;
    curtidas: number;
    respostas: number;
    aguardandoFeedback: boolean;
    dataCriacao: string;
  }[] = [
    {
      id: 1,
      assunto: 'Assunto da pergunta aparece aqui',
      autorTopico: 'Carlos Henrique Santos',
      conteudo:
        'Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo...',
      isLiked: false,
      curtidas: 0,
      respostas: 1,
      aguardandoFeedback: false,
      dataCriacao: '2024-01-01',
    },
    {
      id: 2,
      assunto: 'Assunto da pergunta aparece aqui',
      autorTopico: 'Carlos Henrique Santos',
      conteudo:
        'Comecinho da pergunta aparece aqui resente relato inscreve-se no campo da análise da dimensão e impacto de processo formativo situado impacto de processo formativo processo...',
      isLiked: true,
      curtidas: 1,
      respostas: 1,
      aguardandoFeedback: false,
      dataCriacao: '2024-01-02',
    },
  ];
  textFooter: string[] = [
    'Preservar a memória do evento e ampliar o acesso ao conhecimento ' +
      'científico gerado em eventos é a razão de ser da plataforma Galoá' +
      ' Proceedings.',
    'Os trabalhos publicados aqui têm maior alcance e ficam disponíveis ' +
      'a comunidade científica, mantendo aceso o debate científico ' +
      'formentado pelos encontros e aumentando o impacto do evento.',
  ];
  criandoTopico: boolean = false;
  editandoTopico: boolean = false;
  topicEdit: {
    id: number;
    assunto: string;
    autorTopico: string;
    conteudo: string;
    isLiked: boolean;
    curtidas: number;
    respostas: number;
    aguardandoFeedback: boolean;
    dataCriacao: string;
  } = {
    id: 0,
    assunto: '',
    autorTopico: '',
    conteudo: '',
    isLiked: false,
    curtidas: 0,
    respostas: 0,
    aguardandoFeedback: false,
    dataCriacao: '',
  };
  user: {
    userId: number;
    userName: string;
    topicsAguardandoFeedback: number;
  } = {
    userId: 1,
    userName: 'Carlos Henrique Santos',
    topicsAguardandoFeedback: 0,
  };
  assuntoTopicoField: string = '';
  conteudoTopicoField: string = '';

  ngOnInit() {
    this.notificationNumber();
    this.selectedItemMenu = 5;
    this.textoResumoArray = this.textoResumo.split('\n');
    this.formatTextResumo(this.textoResumo);
    this.sortDiscussoesTopicosDesc();
  }

  sortDiscussoesTopicosDesc() {
    this.discussoesTopicos = this.discussoesTopicos.sort(
      (a, b) =>
        new Date(b.dataCriacao).getTime() - new Date(a.dataCriacao).getTime()
    );
  }

  formatTextResumo(text: string) {
    this.textoResumoFormatado = text.substring(0, this.MAXRESUMOFIELD);
    if (text.length > this.MAXRESUMOFIELD) {
      this.textoResumoFormatado = this.textoResumoFormatado.concat('...');
    }
  }

  selectLanguage(itemId: number) {
    this.selectedLanguages = itemId;
  }

  selectItemMenu(itemId: number) {
    this.selectedItemMenu = itemId;
  }

  notificationNumber(notification: number = 2) {
    this.notificationNoRead += notification;
  }

  handleFavoritarCitacao(citacao: boolean) {
    this.citacaoFavorita = citacao;
  }

  verMaisResumo() {
    if (this.numParagrafosMostrados !== this.textoResumoArray.length) {
      this.numParagrafosMostrados = this.textoResumoArray.length;
    } else {
      this.numParagrafosMostrados = 1;
    }
  }

  likeUnlikePost(like: boolean, idPost: number) {
    let post = this.discussoesTopicos.find((topico) => topico.id === idPost);
    if (post) {
      post.isLiked = !like;
      post.curtidas = like ? post.curtidas - 1 : post.curtidas + 1;
    }
  }

  strongParagrafoFooter(sentenca: string, parteParaDestacar: string) {
    return sentenca.replace(
      parteParaDestacar,
      `<strong>${parteParaDestacar}</strong>`
    );
  }

  criarTopicoDiscussao(criandoTopico: boolean) {
    this.criandoTopico = criandoTopico;
  }

  changeAssuntoTopico(assunto: string) {
    this.assuntoTopicoField = assunto;
  }

  changeConteudoTopico(conteudo: string) {
    this.conteudoTopicoField = conteudo;
  }

  enviarSalvarTopico() {
    if (this.assuntoTopicoField !== '' && this.conteudoTopicoField !== '') {
      if (this.criandoTopico) {
        const topic = this.newTopicData();
        this.discussoesTopicos.push(topic);
        this.user.topicsAguardandoFeedback += 1;
      } else {
        if (this.topicEdit) {
          const indexEdit = this.discussoesTopicos.findIndex(
            (topic) => topic.id === this.topicEdit.id
          );
          const topic = this.editTopicData(this.topicEdit);
          this.discussoesTopicos.splice(indexEdit, 1);
          this.discussoesTopicos.push(topic);
        }
      }
      this.criandoTopico = false;
      this.editandoTopico = false;
      this.sortDiscussoesTopicosDesc();
      this.limparCampos();
    } else {
      alert('Preencha os campos vazios');
    }
  }

  newTopicData() {
    const newTopico: {
      id: number;
      assunto: string;
      autorTopico: string;
      conteudo: string;
      isLiked: boolean;
      curtidas: number;
      respostas: number;
      aguardandoFeedback: boolean;
      dataCriacao: string;
    } = {
      id: this.discussoesTopicos.length + 1,
      assunto: this.assuntoTopicoField,
      autorTopico: this.user.userName,
      conteudo: this.conteudoTopicoField,
      isLiked: false,
      curtidas: 0,
      respostas: 0,
      aguardandoFeedback: true,
      dataCriacao: new Date().toISOString(),
    };
    return newTopico;
  }

  editTopicData(topic: {
    id: number;
    assunto: string;
    autorTopico: string;
    conteudo: string;
    isLiked: boolean;
    curtidas: number;
    respostas: number;
    aguardandoFeedback: boolean;
    dataCriacao: string;
  }) {
    const editedTopic: {
      id: number;
      assunto: string;
      autorTopico: string;
      conteudo: string;
      isLiked: boolean;
      curtidas: number;
      respostas: number;
      aguardandoFeedback: boolean;
      dataCriacao: string;
    } = {
      id: topic?.id || 0,
      assunto: this.assuntoTopicoField || '',
      autorTopico: this.user.userName || '',
      conteudo: this.conteudoTopicoField || '',
      isLiked: topic?.isLiked || false,
      curtidas: topic?.curtidas || 0,
      respostas: topic?.respostas || 0,
      aguardandoFeedback: topic?.aguardandoFeedback || false,
      dataCriacao: new Date().toISOString(),
    };
    return editedTopic;
  }

  limparCampos() {
    this.assuntoTopicoField = '';
    this.conteudoTopicoField = '';
  }

  editarTopicoDiscussoes(editandoTopico: boolean, idTopico: number) {
    this.editandoTopico = editandoTopico;
    const post = this.discussoesTopicos.find(
      (topico) => topico.id === idTopico
    );
    this.topicEdit = post as {
      id: number;
      assunto: string;
      autorTopico: string;
      conteudo: string;
      isLiked: boolean;
      curtidas: number;
      respostas: number;
      aguardandoFeedback: boolean;
      dataCriacao: string;
    };
    if (this.topicEdit) {
      this.assuntoTopicoField = this.topicEdit.assunto;
      this.conteudoTopicoField = this.topicEdit.conteudo;
    }
  }

  itemSelectedMenu() {
    return null;
  }
}
