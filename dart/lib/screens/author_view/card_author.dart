// ignore_for_file: use_super_parameters

import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/material.dart';

import '../../theme/theme.dart';

class CardAuthor extends StatelessWidget {
  const CardAuthor(
      {Key? key,
      required this.name,
      required this.id,
      required this.institution,
      required this.onTap,
      required this.isAuthorPage,
      required this.image})
      : super(key: key);

  final String name;
  final String institution;
  final String image;
  final bool isAuthorPage;
  final int id;
  final VoidCallback onTap;

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onTap,
      child: Card(
        elevation: 0,
        child: Row(
          children: [
            image.isNotEmpty
                ? CachedNetworkImage(
                    imageUrl: image,
                    imageBuilder: (context, imageProvider) => Container(
                      height: isAuthorPage ? 90 : 60,
                      width: isAuthorPage ? 90 : 60,
                      decoration: BoxDecoration(
                        shape: BoxShape.circle,
                        image: DecorationImage(
                          image: imageProvider,
                          fit: BoxFit.cover,
                        ),
                      ),
                    ),
                    placeholder: (context, url) =>
                        const CircularProgressIndicator(),
                    errorWidget: (context, url, error) =>
                        const Icon(Icons.error),
                  )
                : Icon(
                    Icons.person,
                    size: isAuthorPage ? 90 : 60,
                    color: ThemeColor.gray,
                  ),
            Expanded(
              child: Padding(
                padding: const EdgeInsets.only(left: 15.0),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      name,
                      style: TextStyle(fontSize: isAuthorPage ? 22 : 14),
                    ),
                    Text(
                      institution,
                      style: TextStyle(
                          fontSize: isAuthorPage ? 18 : 14,
                          color: ThemeColor.gray),
                    ),
                  ],
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}