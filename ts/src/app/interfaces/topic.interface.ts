import { ITopicLike } from './topic-like.interface';
import { ITopicReply } from './topic-reply.interface';

export interface ITopic {
  id: string;
  subject: string;
  author: string;
  content: string;
  likes: ITopicLike[];
  replies: ITopicReply[];
}
