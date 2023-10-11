export interface ITopicReply {
  id: string;
  author: string;
  type: 'Autor' | 'Coautor' | null;
  content: string;
}
