import DiscussionResponse from './DiscussionResponse';

export default interface Discussion {
  title: string;
  author: string;
  content: string;
  likes: number;
  responses: DiscussionResponse[];
  waiting?: boolean;
  expanded?: boolean;
}
