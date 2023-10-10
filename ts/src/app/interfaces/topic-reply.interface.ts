import { IUser } from './user.interface';

export interface ITopicReply {
  id: string;
  author: IUser;
  type: 'Autor' | 'Coautor' | null;
  content: string;
}
